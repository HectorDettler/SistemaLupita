<?php

namespace App\Http\Controllers;

use App\Models\Compra;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras=Compra::all();
        return view("admin.compras.index",compact("compras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.compras.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'detalle_compra' => 'required',
            'importe_compra' => 'required',
            
        ]);

        $compra= new Compra();
        
        $compra->detalle_compra=$request->detalle_compra;
        $compra->importe_compra=$request->importe_compra;
        $compra->save();


        

        return redirect()->route('admin.compras.index')
        ->with("mensaje","Registro Ingresado Correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $compra=Compra::find($id);
        return view("admin.compras.show",compact("compra"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Compra::destroy($id);

        return redirect()->route("admin.compras.index")
        ->with('mensaje', 'Registro Eliminado Correctamente');
    }
}
