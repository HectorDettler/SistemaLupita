@extends('adminlte::page')

@section('title', 'Menu de Permisos')

@section('content_header')
    <h1>Listado de Permisos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Permisos Registrados </h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/permisos/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Crear Nuevo</a>

                    </div>
                </div>

                <div class="card-body">
                    <table id="tabla" class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col" style="text-align:center">Permiso</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                                
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $permisos as $permiso)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td style="text-align:center">{{ $permiso->name }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            
                                            <a href="{{ url('/admin/permisos/'.$permiso->id) }}" class="btn bg-gradient-primary btn-sm" ><i class="fas fa-eye" ></i></a>
                                            <a href="{{ url('/admin/permisos/'.$permiso->id.'/edit') }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <form action="{{ url('/admin/permisos',$permiso->id) }}" method="post" onclick="preguntar{{$permiso->id}}(event)" id="miFormulario{{ $permiso->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px" ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$permiso->id}}(event){
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
                                                            var form= $('#miFormulario{{$permiso->id}}');
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
    

  <script>
        $('#tabla').DataTable({

            "pageLength":7,
            "language":{
                "emptyTable":"No hay informacion",
                "info":"Mostrando _START_ a _END_ de _TOTAL_ Permisos",
                "infoEmpty":"Mostrando 0 a 0 de 0 Permisos",
                "infofiltered":"(Filtrado de _MAX_ total Permisos)",
                "infoEmpty":"Mostrando 0 a 0 de 0 Permisos",
                "infoPostFix":"",
                "thousands":",",
                "lengthMenu":"Mostrar _MENU_ Permisos",
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