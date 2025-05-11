<?php

namespace App\Http\Controllers;
use App\Models\Configuracion;
use App\Models\Producto;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Cliente;
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
        $configuracion = Configuracion::first(); // te da primer registro 
        $total_clientes=Cliente::count();
        
        return view("admin.index", compact("configuracion","total_roles","total_usuarios","total_marcas","total_categorias","total_productos","total_clientes"));
    }


    public function getMarcas($categoriaId)
    {
        $marcas = Categoria::find($categoriaId)->marcas;  
        return response()->json($marcas);
    }

    

    

}
