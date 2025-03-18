@extends('adminlte::page')

@section('title', 'Menu de Usuarios')

@section('content_header')
    <h1>Usuarios</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del usuario </h3>
                </div>

                <div class="card-body">

                    
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre y Apellido del Usuario</label>
                                    <p>{{ $usuario->name }}</p>
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <p>{{ $usuario->email }}</p>
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="role">Rol del usuario</label>
                                    <p>{{ $usuario->roles->pluck('name')->implode(', ') }}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Fecha y hora de Registro</label>
                                    <p>{{ $usuario->created_at}}</p>                                    
                                </div>
                            </div>

                           

                        </div>

                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/usuarios') }}" class="btn bg-gradient-secondary"> Volver</a>
                                        
                                    </div>
                            </div>

                        </div>

                   
                   
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
    
@stop