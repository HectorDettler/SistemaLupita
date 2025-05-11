<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $producto=Producto::where('codigo_producto',$request->codigo)->first();

        $id_venta= $request->id_venta;

        if($producto){

            $detalle_venta_existe = DetalleVenta::where('id_producto', $producto->id)
            ->where('id_venta', $id_venta)
            ->first();

            if($detalle_venta_existe){

                $detalle_venta_existe->cantidad += $request->cantidad;
                $detalle_venta_existe->save();

                $producto->stock_producto -= $request->cantidad;
                $producto->save();


                return response()->json(['success'=>true,'message'=>'Producto encontrado']);

            }else{
               $detalle_venta= new DetalleVenta();
               $detalle_venta->cantidad=$request->cantidad;
               $detalle_venta->id_venta=$id_venta;
               $detalle_venta->id_producto=$producto->id;
               $detalle_venta->precio_unitario=$producto->precio_venta_producto;
               $detalle_venta->save();

               $producto->stock_producto -= $request->cantidad;
               $producto->save();

               return response()->json(['success' => true, 'message' => 'Producto agregado']);
               
            }
        }else {
            return response()->json(['success'=>false,'message'=>'producto no encontrado']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetalleVenta $detalleVenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $detalleVenta=DetalleVenta::find($id);
        $producto= Producto::find($detalleVenta->id_producto);

        $producto->stock_producto += $detalleVenta->cantidad;
        $producto->save();

        DetalleVenta::destroy($id);


        return response()->json(['success'=>true]);
    }
}
