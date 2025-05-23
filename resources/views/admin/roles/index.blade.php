@extends('adminlte::page')

@section('title', 'Menu de Roles')

@section('content_header')
    <h1>Listado de roles</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles Registrados </h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/roles/create') }}" class="btn bg-gradient-primary"><i class="fa fa-plus"></i> Agregar un rol</a>

                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="text-align:center">Nro</th>
                                <th scope="col" style="text-align:center">Rol</th>
                                <th scope="col" style="text-align:center">Acciones</th>
                                
                            </tr>  
                        </thead>
                        <tbody>
                            <?php $contador=1; ?>
                            @foreach ( $roles as $role)
                                <tr>
                                    <td style="text-align:center">{{ $contador++ }}</td>
                                    <td style="text-align:center">{{ $role->name }}</td>
                                    <td style="text-align:center">
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="{{ url('/admin/roles/'.$role->id.'/edit') }}" class="btn bg-gradient-success btn-sm" ><i class="fas fa-pencil" ></i></a>
                                            <a href="{{ url('/admin/roles/'.$role->id.'/asignar') }}" class="btn bg-gradient-warning btn-sm" ><i class="fas fa-check" ></i></a>
                                            <form action="{{ url('/admin/roles',$role->id) }}" method="post" onclick="preguntar{{$role->id}}(event)" id="miFormulario{{ $role->id }}">
                                                @csrf
                                                @method ('DELETE')
                                                <button type="submit" class="btn bg-gradient-danger btn-sm" style="border-radius: 0px 5px 5px 0px" ><i class="fas fa-trash"></i></button>
                                            </form>
                                            <script>

                                                function preguntar{{$role->id}}(event){
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
                                                            var form= $('#miFormulario{{$role->id}}');
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