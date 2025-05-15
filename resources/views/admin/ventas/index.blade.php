@extends('adminlte::page')

@section('title', 'Menu de Ventas')

@section('content_header')
    <h1>Lista de Ventas</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ventas Registradas </h3>
                    <div class="card-tools">

                        <a href="{{ url('/admin/ventas/reporte') }}" target="_blank" class="btn bg-gradient-success"><i class="fa fa-file-pdf"></i> Crear Reporte</a>

                       
                        @if($arqueo_abierto)
                            <a href="{{ url('/admin/ventas/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Agregar una Venta</a>
                        @else
                            <a href="{{ url('/admin/arqueos/create') }}" class="btn bg-gradient-danger"> Abrir Caja</a>
                        @endif

                        
                    </div>
                </div>

                <div class="card-body">
                    <table id="tabla" class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                
                                <th scope="col" style="text-align:center">Fecha</th>
                                <th scope="col" style="text-align:center">Precio Total</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $ventas as $venta)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td style="text-align:center">{{ $venta->fecha_venta }}</td>
                                    <td style="text-align:center">{{ $venta->precio_total_venta }}</td>   
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a href="{{ url('/admin/ventas/'.$venta->id) }}" class="btn bg-gradient-primary btn-sm" ><i class="fas fa-eye" ></i></a>
                                            <a href="{{ url('/admin/ventas/'.$venta->id.'/edit') }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <a href="{{ url('/admin/ventas/pdf/'.$venta->id) }}" target="_blank" class="btn bg-gradient-warning btn-sm" ><i class="fas fa-print" ></i></a>

                                            <form action="{{ url('/admin/ventas',$venta->id) }}" method="post" onclick="preguntar{{$venta->id}}(event)" id="miFormulario{{ $venta->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px"  ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$venta->id}}(event){
                                                    event.preventDefault();
                                                    
                                                    
                                                    Swal.fire({
                                                        title:'¿Desea eliminar este registro?',
                                                        text:'',
                                                        icon:'question',
                                                        showDenyButton: true,
                                                        confirmButtonText:'Eliminar',
                                                        confirmButtonColor:'a#5161d',
                                                        denyButtonColor:'#270a0a',
                                                        denyButtonText:'Cancelar'
                                                    }).then((result)=>{
                                                        if(result.isConfirmed){
                                                            var form= $('#miFormulario{{$venta->id}}');
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


    <script>
        $('#tabla').DataTable({

            "pageLength":5,
            "language":{
                "emptyTable":"No hay informacion",
                "info":"Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty":"Mostrando 0 a 0 de 0 Ventas",
                "infofiltered":"(Filtrado de _MAX_ total Ventas)",
                "infoEmpty":"Mostrando 0 a 0 de 0 Ventas",
                "infoPostFix":"",
                "thousands":",",
                "lengthMenu":"Mostrar _MENU_ Ventas",
                "loadingRecords":"Cargando...",
                "processing":"Procesando...",
                "search":"Buscador:",
                "zeroRecords":"Sin resultados encontrados",
                "paginate":{
                    "first":"Primero",
                    "last":"Ultimo",
                    "next":"Siguiente",
                    "previous": "Anterior"
                }
            },

        });
    </script>
@stop