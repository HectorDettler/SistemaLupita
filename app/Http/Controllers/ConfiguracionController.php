<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        
        $configuracion = Configuracion::first();  

        
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'direccion_empresa' => 'required|string|max:255',
            'correo_empresa' => 'required|email|max:255',
            'telefono_empresa' => 'required|string|max:255',
        ]);

        // Obtener la configuración por su ID
        $configuracion = Configuracion::findOrFail($id);

        // Actualizar los campos
        $configuracion->update($request->all());

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('admin.configuracion.edit')
        ->with('mensaje', 'Configuración actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
}
