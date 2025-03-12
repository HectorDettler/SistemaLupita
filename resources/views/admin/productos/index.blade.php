@extends('adminlte::page')

@section('title', 'Menu de Productos')

@section('content_header')
    <h1>Lista de Productos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Productos Registrados </h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/productos/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Agregar un Producto</a>

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col" style="text-align:center">Nombre</th>
                                <th scope="col" style="text-align:center">Codigo</th>
                                <th scope="col" style="text-align:center">Stock</th>
                                <th scope="col" style="text-align:center">Precio de Venta</th>
                                <th scope="col" style="text-align:center">Fecha de Vencimiento</th>
                                <th scope="col" style="text-align:center">Imagen</th>



                                <th scope="col" style="text-align:center">Acciones</th>
                                
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $productos as $producto)
                                <tr>
                                    <td style="text-align:center; vertical-align:middle">{{ $contador++ }}</td>
                                    <td style="text-align:center; vertical-align:middle">{{ $producto->nombre_producto }}</td>
                                    <td style="text-align:center; vertical-align:middle">{{ $producto->codigo_producto }}</td>
                                    <td style="text-align:center; vertical-align:middle">{{ $producto->stock_producto }}</td>
                                    <td style="text-align:center; vertical-align:middle">{{ $producto->precio_venta_producto }}</td>
                                    <td style="text-align:center; vertical-align:middle">{{ $producto->fecha_vencimiento_producto }}</td>
                                    <td style="text-align:center">

                                        <img src="{{ asset('storage/'.$producto->imagen_producto) }}" width="100px" alt="imagen">

                                    </td>

                                    <td style="text-align:center; vertical-align:middle">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ url('/admin/productos/'.$producto->id) }}" class="btn bg-gradient-primary btn-sm" ><i class="fas fa-eye" ></i></a>
                                            <a href="{{ url('/admin/productos/'.$producto->id.'/edit') }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <form action="{{ url('/admin/productos',$producto->id) }}" method="post" onclick="preguntar{{$producto->id}}(event)" id="miFormulario{{ $producto->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px"  ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$producto->id}}(event){
                                                    event.preventDefault();
                                                    
                                                    
                                                    Swal.fire({
                                                        title:'¿Desea elminar este registro?',
                                                        text:'',
                                                        icon:'question',
                                                        showDenyButton: true,
                                                        confirmButtonText:'Eliminar',
                                                        confirmButtonColor:'a#5161d',
                                                        denyButtonColor:'#270a0a',
                                                        denyButtonText:'Cancelar'
                                                    }).then((result)=>{
                                                        if(result.isConfirmed){
                                                            var form= $('#miFormulario{{$producto->id}}');
                                                            form.submit();
                                                        }

                                                    });
                                                    
                                                }

                                            </script>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
              </div>
              
            </div>
            
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop