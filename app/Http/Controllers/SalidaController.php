<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Models\MovimientoCaja;
use App\Models\Arqueo;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
    {
        $arqueo_abierto=Arqueo::whereNull('fecha_cierre_arqueo')->first();
        $salidas=Salida::all();
        return view("admin.salidas.index",compact("salidas","arqueo_abierto"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view("admin.salidas.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detalle_salida' => 'required',
            'importe_salida' => 'required',
            
        ]);

        $salida= new Salida();
        
        $salida->detalle_salida=$request->detalle_salida;
        $salida->importe_salida=$request->importe_salida;
        $salida->save();

        //registro de arqueo
        $arqueo_id= Arqueo::whereNull('fecha_cierre_arqueo')->first();
        $movimiento= new MovimientoCaja ();

        $movimiento->tipo_movimiento= "EGRESO";
        $movimiento->monto_movimiento= $request->importe_salida;
        $movimiento->detalle_movimiento= $request->detalle_salida;

        $movimiento->arqueo_id= $arqueo_id->id;

        $movimiento->save();

        return redirect()->route('admin.salidas.index')
        ->with("mensaje","Registro Ingresado Correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $salida=Salida::find($id);
        return view("admin.salidas.show",compact("salida"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salida $salida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salida $salida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Salida::destroy($id);

        return redirect()->route("admin.salidas.index")
        ->with('mensaje', 'Registro Eliminado Correctamente');
    }
}
