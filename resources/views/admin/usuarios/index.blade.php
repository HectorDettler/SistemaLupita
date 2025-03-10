@extends('adminlte::page')



@section('content_header')
    <h1>Listado de Usuarios</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Usuarios Registrados </h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/usuarios/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar un Usuario</a>

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col">Nombre del Usuario</th>
                                <th scope="col">Email</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                                
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $usuarios as $usuario)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">

                                            <a href="{{ url('/admin/usuarios/'.$usuario->id) }}" class="btn btn-primary btn-sm" ><i class="fas fa-eye" ></i></a>
                                            <a href="{{ url('/admin/usuarios/'.$usuario->id.'/edit') }}" class="btn btn-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <form action="{{ url('/admin/usuarios', $usuario->id) }}" method="post" id="miFormulario{{ $usuario->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px" data-usuario-id="{{ $usuario->id }}"  onclick="preguntar(event)"><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar(event){
                                                    event.preventDefault();
                                                    var usuarioId = $(event.target).data('usuario-id');
                                                    
                                                    
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
                                                            var form = $('#miFormulario{{$usuario->id}}');

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