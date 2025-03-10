<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=User::all();
        return view('admin.usuarios.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('admin.usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos=request()->all();
        //return response()->json($datos);

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users',
            'password'=> 'required|confirmed', 

        ]);

        $usuario= new User();

        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=Hash::make($request->password);

        $usuario->save();

        $usuario->assignRole($request->role);

        return redirect()->route('admin.usuarios.index')
        ->with("mensaje","Usuario registrado Correctamente");



    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $usuario=User::find($id);
        return view("admin.usuarios.show",compact("usuario"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $usuario=User::find($id);
        $roles=Role::all(); 
        return view("admin.usuarios.edit",compact("usuario","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:users,email,'.$id,

        ]);

        $usuario=User::find($id);
        $usuario->name=$request->name;
        $usuario->email=$request->email;
        if($request->filled('password')){
            $usuario->password=Hash::make($request->password);
        }
        $usuario->save();
        $usuario->syncRoles($request->role);   

        return redirect()->route('admin.usuarios.index')
        ->with("mensaje","Usuario actualizado Correctamente");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        User::destroy($id);

        return redirect()->route("admin.usuarios.index")
        ->with('mensaje', 'Usuario Eliminado Correctamente');
    }
}
