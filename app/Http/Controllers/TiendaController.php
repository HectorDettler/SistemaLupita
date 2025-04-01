<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

class TiendaController extends Controller
{
    public function index(){

        $productos = Producto::take(12)->get();
        //$productos = Producto::orderBy('created_at', 'desc')->take(12)->get(); ->por si quiero traer los productos mas actuales.
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view("tienda.index", compact('productos','categorias', 'marcas'));

    }
    
    public function show($id)
    {

        $productos = Producto::findOrFail($id);
        return view('tienda.detalle', compact('productos'));
    }


    
}
