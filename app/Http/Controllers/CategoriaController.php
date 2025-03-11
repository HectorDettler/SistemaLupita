<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias= Categoria::all();
        return view("admin.categorias.index",compact("categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:categorias',
        ]);

        $categoria= new Categoria();
        
        $categoria->name=$request->name;
        

        $categoria->save();

        return redirect()->route('admin.categorias.index')
        ->with("mensaje","Categoria registrada Correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( string $id)
    {
        $categoria=Categoria::find($id);
        return view("admin.categorias.edit",compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>'required|unique:categorias,name,'.$id,
        ]);

        $categoria=Categoria::find($id);

        $categoria->name=$request->name;
        

        $categoria->save();

        return redirect()->route("admin.categorias.index")
        ->with('mensaje', 'Categoria modificada Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Categoria::destroy($id);

        return redirect()->route("admin.categorias.index")
        ->with('mensaje', 'Categoria Eliminada Correctamente');
    }
}
