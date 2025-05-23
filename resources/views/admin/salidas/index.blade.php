@extends('adminlte::page')

@section('title', 'Menu de Salidas')

@section(section: 'content_header')
    <h1>Registros de Salidas</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Salidas </h3>
                    <div class="card-tools">

                        @if($arqueo_abierto)
                            <a href="{{ url('/admin/salidas/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Nuevo Registro</a>
                        @else
                            <a href="{{ url('/admin/arqueos/create') }}" class="btn bg-gradient-danger"><i class="fa fa-plus"></i> Abrir Caja</a>
                        @endif
                        
                    </div>
                </div>

                <div class="card-body">
                    <table id="tabla" class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col" style="text-align:center">Detalle</th>
                                <th scope="col" style="text-align:center">Importe</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                                
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $salidas as $salida)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td style="text-align:center">{{ $salida->detalle_salida }}</td>
                                    <td style="text-align:center">{{ $salida->importe_salida }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/salidas/'.$salida->id) }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-eye" ></i></a>
                                            
                                            <form action="{{ url('/admin/salidas',$salida->id) }}" method="post" onclick="preguntar{{$salida->id}}(event)" id="miFormulario{{ $salida->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px"  ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$salida->id}}(event){
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
                                                            var form= $('#miFormulario{{$salida->id}}');
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
                "info":"Mostrando _START_ a _END_ de _TOTAL_ Salidas",
                "infoEmpty":"Mostrando 0 a 0 de 0 Salidas",
                "infofiltered":"(Filtrado de _MAX_ total Salidas)",
                "infoEmpty":"Mostrando 0 a 0 de 0 Salidas",
                "infoPostFix":"",
                "thousands":",",
                "lengthMenu":"Mostrar _MENU_ Salidas",
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