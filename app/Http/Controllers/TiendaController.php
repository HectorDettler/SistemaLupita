<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

class TiendaController extends Controller
{
    public function index(){

        $productos = Producto::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();

        return view("tienda.index", compact('productos','categorias', 'marcas'));

    }
    
    public function show($id)
    {

        $productos = Producto::all();
        return view('tienda.detalle', compact('productos'));
    }


    
}
