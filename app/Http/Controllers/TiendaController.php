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



    public function productos(Request $request)
    {
        // Cargar categorías y marcas para los filtros
        $categorias = Categoria::all();
        $marcas = Marca::all();

        // Crear la consulta base
        $query = Producto::query();

        // Filtrar por marca (id_marca)
        if ($request->filled('marca_id')) {
            $query->where('id_marca', $request->marca_id);
        }

        // Filtrar por categoría (id_categoria)
        if ($request->filled('categoria_id')) {
            $query->where('id_categoria', $request->categoria_id);
        }

        // Filtrar por nombre de producto (búsqueda)
        if ($request->filled('query')) {
            $query->where('nombre_producto', 'LIKE', '%' . $request->query('query') . '%');
        }

        // Obtener productos filtrados con paginación
        $productos = $query->paginate(12);

        return view('tienda.productos', compact('productos', 'categorias', 'marcas'));
    }


    
    
    public function show($id)
    {

        $productos = Producto::findOrFail($id);
        return view('tienda.detalle', compact('productos'));
    }


    
}
