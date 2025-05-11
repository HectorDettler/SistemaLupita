<?php

namespace App\Http\Controllers;

use App\Models\TmpVenta;
use App\Models\Producto;
use Illuminate\Http\Request;

class TmpVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function tmp_ventas(Request $request){

        $producto = Producto::where('codigo_producto', $request->codigo)->first();

        $sesion_id = session()->getId();

        if($producto){


            $tmp_venta_existe= TmpVenta::where('id_producto',$producto->id)
                                        ->where('session_id',$sesion_id)
                                        ->first();

            if($tmp_venta_existe){

                $tmp_venta_existe->cantidad += $request->cantidad;
                $tmp_venta_existe->save();
                return response()->json(['success'=>true,'message'=>'producto encontrado']);

            }else{

                $tmp_venta= new TmpVenta();

                $tmp_venta->cantidad= $request->cantidad;
                $tmp_venta->id_producto= $producto->id;
                $tmp_venta->session_id= session()->getId();

                // Guardar el precio normal del producto
                $tmp_venta->precio_unitario = $producto->precio_venta_producto;
    
                $tmp_venta->save();
    
                return response()->json(['success'=>true,'message'=>'producto encontrado']);

            }
           
        }else{
            return response()->json(['success'=>false,'message'=>'producto no encontrado']);

        }


    }


    public function aplicarOferta($id)
    {
        $tmp_venta = TmpVenta::find($id);

        if (!$tmp_venta) {
            return response()->json(['success' => false, 'message' => 'Producto no encontrado en la lista.']);
        }

        $producto = $tmp_venta->producto;

        if ($producto->precio_oferta_producto > 0) {
            $tmp_venta->precio_unitario = $producto->precio_oferta_producto;
            $tmp_venta->save();

            return response()->json(['success' => true, 'message' => 'Precio de oferta aplicado.']);
        }

        return response()->json(['success' => false, 'message' => 'Este producto no tiene precio de oferta.']);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TmpVenta $tmpVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TmpVenta::destroy($id);
        return response()->json(['success'=>true]);

    }
}
