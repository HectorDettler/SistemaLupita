<?php

namespace App\Http\Controllers;
use App\Models\Configuracion;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;


class AdminController extends Controller
{
    public function index(){
        $total_roles=Role::count();
        $total_usuarios=User::count();
        $configuracion = Configuracion::first(); // Obtiene el primer y único registro
        return view("admin.index", compact("configuracion","total_roles","total_usuarios"));
    }
}
