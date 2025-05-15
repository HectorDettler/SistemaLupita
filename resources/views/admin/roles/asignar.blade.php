@extends('adminlte::page')

@section('title', 'Menu de Roles')

@section('content_header')
    <h1>Asignar Permisos al Rol: {{ $rol ->name}}</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">

                    <h3 class="card-title">Permisos registrados </h3>

                </div>

                <div class="card-body">
                   <form action="{{ url('/admin/roles/asignar',$rol->id) }}" method="post">
                        @csrf
                        @method ('PUT')
                        @foreach ( $permisos as $permiso )
                            <div class="form-check">
                                <input  class="form-check-input" type="checkbox" name="permisos[]"
                                value="{{ $permiso->id}}"{{ $rol->hasPermissionTo($permiso->name)?'checked':'' }}>
                                <label for="" class="form-check-label">{{ $permiso->name }}</label>
                            </div>
                        @endforeach
                        <hr>
                        <button type="submit" class="btn btn-primary">Guardar</button>

                   </form>
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