<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos=request()->all();
        //return response()->json($datos);

        $request->validate([
            'name'=> 'required|unique:roles',
        ]);

        $rol= new Role();
        
        $rol->name=$request->name;
        $rol->guard_name="web";

        $rol->save();

        return redirect()->route('admin.roles.index')
        ->with("mensaje","Rol registrado Correctamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role=Role::find($id);
        return view("admin.roles.edit",compact("role"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$id,
        ]);

        $rol=Role::find($id);

        $rol->name=$request->name;
        $rol->guard_name="web";

        $rol->save();

        return redirect()->route("admin.roles.index")
        ->with('mensaje', 'Rol modificado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        
        Role::destroy($id);

        return redirect()->route("admin.roles.index")
        ->with('mensaje', 'Rol Eliminado Correctamente');
    }

    public function asignar($id){

        $rol=Role::find($id);
        $permisos= Permission::all();

        return view('admin.roles.asignar',compact('permisos','rol'));
    }

    public function update_asignar(Request $request, $id){


       

        $rol= Role::find($id);

        $rol->permissions()->sync($request->input('permisos'));

        return redirect()->back()
        ->with('mensaje', 'Permisos Asignados Correctamente Correctamente');



    }


}
