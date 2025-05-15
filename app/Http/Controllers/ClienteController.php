<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes=Cliente::all();
        return view("admin.clientes.index",compact("clientes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.clientes.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'celular_cliente' => 'required',
            'email_cliente' => 'required',
            'aprobado_cliente' => 'nullable|boolean',  
        ]);
    
        $cliente = new Cliente();
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->celular_cliente = $request->celular_cliente;
        $cliente->email_cliente = $request->email_cliente;
        $cliente->aprobado_cliente = $request->aprobado_cliente == "1" ? 1 : 0;

    
        $cliente->save();
    
        return redirect()->route('admin.clientes.index')->with("mensaje", "Cliente Ingresado Correctamente");


        //$datos=request()->all();
        //return response()->json($datos);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.show', compact('cliente'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'nombre_cliente' => 'required',
            'celular_cliente' => 'required',
            'email_cliente' => 'required',
            'aprobado_cliente' => 'nullable|boolean',  
        ]);
    
        $cliente = Cliente::find($id);
        $cliente->nombre_cliente = $request->nombre_cliente;
        $cliente->celular_cliente = $request->celular_cliente;
        $cliente->email_cliente = $request->email_cliente;
        $cliente->aprobado_cliente = $request->aprobado_cliente == "1" ? 1 : 0;

    
        $cliente->save();
    
        return redirect()->route('admin.clientes.index')->with("mensaje", "Cliente Actualizado Correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Cliente::destroy($id);
        return redirect()->route('admin.clientes.index')->with("mensaje", "Cliente Eliminado Correctamente");

    }

    public function reporte (){


        $clientes= Cliente::all();
        $pdf= PDF::loadView('admin.clientes.reporte',compact('clientes'));
        return $pdf->stream();

    }
}
