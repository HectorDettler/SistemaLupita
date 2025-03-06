<?php

namespace App\Http\Controllers;
use App\Models\Configuracion;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){

        $configuracion = Configuracion::first(); // Obtiene el primer y único registro
        return view("admin.index", compact("configuracion"));
    }
}
