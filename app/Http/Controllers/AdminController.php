<?php

namespace App\Http\Controllers;
use App\Models\Configuracion;
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index(){
        $total_roles=Role::count();
        $total_usuarios=User::count();
        $total_marcas=Marca::count();
        $total_categorias=Categoria::count();
        $total_productos=Producto::count();
        $configuracion = Configuracion::first(); // Obtiene el primer y único registro
        return view("admin.index", compact("configuracion","total_roles","total_usuarios","total_marcas","total_categorias","total_productos"));
    }


    public function getMarcas($categoriaId)
    {
        $marcas = Categoria::find($categoriaId)->marcas;  // Aquí puedes obtener las marcas asociadas a la categoría.
        return response()->json($marcas);
    }

    

}
