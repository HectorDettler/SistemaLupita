<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas=Salida::all();
        return view("admin.salidas.index",compact("salidas"));
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
    public function destroy(Salida $salida)
    {
        //
    }
}
