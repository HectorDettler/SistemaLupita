<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos=Producto::with(['categoria', 'marca'])->get();
        return view("admin.productos.index", compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $marcas = Marca::all();
    
    return view("admin.productos.create", compact('categorias', 'marcas'));
    
    }


   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        

        $request->validate([
            'codigo_producto'=> 'required|unique:productos,codigo_producto',
            'nombre_producto'=> 'required',
            
            'stock_producto'=> 'required',
            'stock_min_producto'=> 'required',
            'stock_max_producto'=> 'required',
            'precio_oferta_producto'=> 'nullable',
            'precio_venta_producto'=> 'required',
            'fecha_vencimiento_producto'=> 'required',
            
        ]);

        $producto=new Producto();

        $producto->codigo_producto = $request->codigo_producto;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->stock_min_producto = $request->stock_min_producto;
        $producto->stock_max_producto = $request->stock_max_producto;
        $producto->precio_oferta_producto = $request->precio_oferta_producto;
        $producto->precio_venta_producto = $request->precio_venta_producto;
        $producto->fecha_vencimiento_producto = $request->fecha_vencimiento_producto;
        $producto->id_categoria = $request->categoria_id;
        $producto->id_marca = $request->marca_id;

        if($request->hasFile('imagen_producto')){
            $producto->imagen_producto= $request->file('imagen_producto')->store('productos','public');
        };

        $producto->save();

        return redirect()->route ('admin.productos.index')
        ->with('mensaje', 'Producto agregado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $producto= Producto::find($id);
        
        
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('admin.productos.show',compact('producto','categorias','marcas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto= Producto::find($id);
        
        
        $categorias = Categoria::all();
        $marcas = Marca::all();
        return view('admin.productos.edit',compact('producto','categorias','marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        

        $request->validate([
            'codigo_producto'=> 'required|unique:productos,codigo_producto,'.$id,
            'nombre_producto'=> 'required',
            
            'stock_producto'=> 'required',
            'stock_min_producto'=> 'required',
            'stock_max_producto'=> 'required',
            'precio_oferta_producto'=> 'nullable',
            'precio_venta_producto'=> 'required',
            'fecha_vencimiento_producto'=> 'required',
            
        ]);


        $producto=Producto::find($id);

        $producto->codigo_producto = $request->codigo_producto;
        $producto->nombre_producto = $request->nombre_producto;
        $producto->descripcion_producto = $request->descripcion_producto;
        $producto->stock_producto = $request->stock_producto;
        $producto->stock_min_producto = $request->stock_min_producto;
        $producto->stock_max_producto = $request->stock_max_producto;
        $producto->precio_oferta_producto = $request->precio_oferta_producto;
        $producto->precio_venta_producto = $request->precio_venta_producto;
        $producto->fecha_vencimiento_producto = $request->fecha_vencimiento_producto;
        $producto->id_categoria = $request->categoria_id;
        $producto->id_marca = $request->marca_id;


        
        // Si hay una nueva imagen
        if ($request->hasFile('imagen_producto')) {
            
            if ($producto->imagen_producto) {
                
                $imagePath = $producto->imagen_producto;
                
                // Verificar si el archivo existe en el almacenamiento
                if (Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                    
                } else {
                    
                }
            }
        
            // Subir la nueva imagen
            $producto->imagen_producto = $request->file('imagen_producto')->store('productos', 'public');
            
        }
        $producto->save();

        return redirect()->route ('admin.productos.index')
        ->with('mensaje', 'Producto actualizado correctamente');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $producto= Producto::find($id);
        Producto::destroy($id);

            
        if ($producto->imagen_producto) {
                
            $imagePath = $producto->imagen_producto;
                
            // Verificar si el archivo existe en el almacenamiento
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
                    
            } else {
                    
            }
        }
            
        

        return redirect()->route("admin.productos.index")
        ->with('mensaje', 'Producto Eliminado Correctamente');
    }
}
