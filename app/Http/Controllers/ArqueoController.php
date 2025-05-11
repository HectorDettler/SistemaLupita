<?php

namespace App\Http\Controllers;

use App\Models\Arqueo;
use App\Models\MovimientoCaja;
use Illuminate\Http\Request;

class ArqueoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arqueoAbierto= Arqueo::whereNull('fecha_cierre_arqueo')->first();

        $arqueos=Arqueo::with('movimientos')->get();

        foreach($arqueos as $arqueo){
            
            $arqueo->total_ingreso = $arqueo->movimientos->where('tipo_movimiento','INGRESO')->sum('monto_movimiento');
            $arqueo->total_engreso = $arqueo->movimientos->where('tipo_movimiento','EGRESO')->sum('monto_movimiento');



        }   

        return view ('admin.arqueos.index',compact('arqueos','arqueoAbierto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.arqueos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_apertura_arqueo'=>'required',
        ]);

        $arqueo= new Arqueo ();

        $arqueo->fecha_apertura_arqueo=$request->fecha_apertura_arqueo;
        $arqueo->monto_inicial_arqueo=$request->monto_inicial_arqueo;

        $arqueo->save();

        return redirect()->route('admin.arqueos.index')
            ->with('mensaje','Arqueo Creado Correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $arqueo= Arqueo::find($id)->first();
        $movimientos= MovimientoCaja::where('arqueo_id',$id)->get();
        return view ('admin.arqueos.show', compact('arqueo','movimientos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $arqueo= Arqueo::find($id)->first();

        return view ('admin.arqueos.edit', compact('arqueo'));

    }



    public function ingresoegreso($id){

        $arqueo=Arqueo::find($id);
        return view('admin.arqueos.ingreso_egreso', compact('arqueo'));
    }


    public function store_ingreso_egreso(Request $request){

        $request->validate([
            'monto_movimiento'=>'required',
        ]);

        $movimiento= new MovimientoCaja ();

        $movimiento->tipo_movimiento= $request->tipo_movimiento;
        $movimiento->monto_movimiento= $request->monto_movimiento;

        $movimiento->detalle_movimiento= $request->detalle_movimiento;

        $movimiento->arqueo_id= $request->id;

        $movimiento->save();

         return redirect()->route('admin.arqueos.index')
            ->with('mensaje','Movimiento Registrado Correctamente');


    }


    public function cierre ($id){

        $arqueo=Arqueo::find($id);



        return view ('admin.arqueos.cierre', compact('arqueo'));

    }


    public function store_cierre(Request $request){

        //$datos=request()->all();
        //return response()->json($datos);

        $arqueo = Arqueo::find($request->id);
        $arqueo->fecha_cierre_arqueo =$request->fecha_cierre_arqueo;
        $arqueo->monto_final_arqueo =$request->monto_final_arqueo;
        
        $arqueo->save();

        return redirect()->route('admin.arqueos.index')
            ->with('mensaje','Arqueo Cerrado Correctamente');


    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos=request()->all();
        //return response()->json($datos);


        $request->validate([
            'fecha_apertura_arqueo'=>'required',
        ]);

        $arqueo= Arqueo::find ($id);

        $arqueo->fecha_apertura_arqueo=$request->fecha_apertura_arqueo;
        $arqueo->monto_inicial_arqueo=$request->monto_inicial_arqueo;

        $arqueo->save();

        return redirect()->route('admin.arqueos.index')
            ->with('mensaje','Arqueo Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            Arqueo::destroy($id);

        return redirect()->route("admin.arqueos.index")
        ->with('mensaje', 'Arqueo Eliminado Correctamente');
    }
}
