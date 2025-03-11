<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas= Marca::all();
        return view("admin.marcas.index",compact(var_name: "marcas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categorias= Categoria::all();
        return view('admin.marcas.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'categorias' => 'array' // Asegura que sea un array de categorías
        ]);

        $marca = Marca::create($request->only('name')); 

        if ($request->has('categorias')) {
            $marca->categorias()->sync($request->categorias); // Relaciona la marca con las categorías seleccionadas
        }
    
        return redirect()->route('admin.marcas.index')
        ->with('mensaje', 'Marca registrada Correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $marca=Marca::find($id);
        return view("admin.marcas.show",compact("marca"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marca $marca)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Marca::destroy($id);

        return redirect()->route("admin.marcas.index")
        ->with('mensaje', 'Marca Eliminada Correctamente');
    }
}
