<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\TmpVenta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\TipoPago;
use App\Models\Arqueo;
use App\Models\MovimientoCaja;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use NumberToWords\NumberToWords;
use NumberFormatter;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function index()
    {
        $arqueo_abierto=Arqueo::whereNull('fecha_cierre_arqueo')->first();
        $ventas=Venta::with('detallesVenta')->get();
        return view( 'admin.ventas.index',compact('ventas','arqueo_abierto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos=Producto::all();
        $session_id= session()->getId();
        $tmp_ventas = TmpVenta::with('producto')
        ->where('session_id', session()->getId())
        ->get();
        $tipos_pago = TipoPago::all();
        return view( 'admin.ventas.create', compact('productos','tmp_ventas','tipos_pago'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos=request()->all();
        //return response()->json($datos);

        $request->validate ([
            'fecha_venta'=>'required',
            'tipo_pago_id' => 'required|exists:tipos_pago,id',
            'precio_total_venta'=>'required',
            'porcentaje_agregado' => 'required|numeric|min:0'
            
        ]);

        $session_id=session()->getId();

        $venta= new Venta();
        $venta->fecha_venta=$request->fecha_venta;
        $venta->tipo_pago_id = $request->tipo_pago_id;
        $venta->porcentaje_impuesto = $request->porcentaje_agregado;
        $venta->precio_total_venta=$request->precio_total_venta;
        

        $venta-> save();

        //registro de arqueo
        $arqueo_id= Arqueo::whereNull('fecha_cierre_arqueo')->first();
        $movimiento= new MovimientoCaja ();

        $movimiento->tipo_movimiento= "INGRESO";
        $movimiento->monto_movimiento= $request->precio_total_venta;
        $movimiento->detalle_movimiento= "Venta de Productos";

        $movimiento->arqueo_id= $arqueo_id->id;

        $movimiento->save();

        $tmp_ventas= TmpVenta::where('session_id',$session_id)->get();

        foreach ($tmp_ventas as $tmp_venta){

            $producto= Producto::where('id', $tmp_venta->id_producto)->first();

            $detalle_venta= new DetalleVenta();
            $detalle_venta->cantidad=$tmp_venta->cantidad;
            $detalle_venta->id_venta=$venta->id;
            $detalle_venta->id_producto=$tmp_venta->id_producto;
            $detalle_venta->precio_unitario = $tmp_venta->precio_unitario; 
            $detalle_venta->save();

            $producto->stock_producto -= $tmp_venta->cantidad;
            $producto->save();

        }

        TmpVenta::where('session_id',$session_id)->delete();

        return redirect()->route('admin.ventas.index')
            ->with('mensaje','Se Registro la venta Correctamente');

    }




    public function pdf($id){

        function numeroALetrasConDecimales($numero)
        {
            $formatter = new NumberFormatter("es", NumberFormatter::SPELLOUT);

            $partes=explode('.',number_format($numero,2,'.',''));
            $entero=$formatter->format($partes[0]);
            $decimal=$formatter->format($partes[1]);

            return ucfirst("$entero Pesos, con $decimal Centavos");
        }

        

        
        $venta=Venta::with('detallesVenta', 'tipoPago')->findOrFail($id);

        $numero=$venta->precio_total_venta;
        $literal= numeroALetrasConDecimales($numero);

        $pdf= PDF::loadView('admin.ventas.pdf',compact('venta','literal'));
        return $pdf->stream();

        

    }

    

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        
        $venta=Venta::with('detallesVenta', 'tipoPago')->findOrFail($id);
        return view( 'admin.ventas.show',compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $productos=Producto::all();
        $tipos_pagos = TipoPago::all();

        $venta=Venta::with('detallesVenta')->findOrFail($id);
        return view( 'admin.ventas.edit',compact('venta','productos','tipos_pagos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos=request()->all();
        //return response()->json($datos);

        $request->validate ([
            'fecha_venta'=>'required',
            'tipo_pago_id' => 'required|exists:tipos_pago,id',
            'precio_total_venta'=>'required',
            'porcentaje_agregado' => 'required|numeric|min:0'
            
        ]);


        $venta= Venta::find($id);
        $venta->fecha_venta=$request->fecha_venta;
        $venta->tipo_pago_id = $request->tipo_pago_id;
        $venta->porcentaje_impuesto = $request->porcentaje_agregado;
        $venta->precio_total_venta=$request->precio_total_venta;

        $venta->save();


        return redirect()->route('admin.ventas.index')
            ->with('mensaje','Venta actualizada Correctamente');


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venta= Venta::find($id);

        foreach($venta->detallesVenta as $detalle){
            $producto= Producto::find($detalle->id_producto);
            $producto->stock_producto += $detalle->cantidad;
            $producto->save();
        }

        $venta->detallesVenta()->delete();

        Venta::destroy($id);

        return redirect ()->route('admin.ventas.index')
        ->with('mensaje','Venta Eliminada Correctamente');
    }
}
