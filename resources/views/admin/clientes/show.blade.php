@extends('adminlte::page')

@section('title', 'Menu de Compras')

@section('content_header')
    <h1>Detalles</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del Registro </h3>
                </div>

                <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cliente">Nombre y Apellido</label>
                                    <p>{{ $cliente->nombre_cliente }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="celular_cliente">Celular</label>
                                    <p>{{ $cliente->celular_cliente }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email_cliente">Email</label>
                                    <p>{{ $cliente->email_cliente }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cliente">Estado Cliente</label>
                                    <p>
                                        @if($cliente->aprobado_cliente)
                                            <span class="badge bg-success fs-5 py-2 px-3">Activo</span>
                                        @else
                                            <span class="badge bg-danger fs-5 py-2 px-3">Inactivo</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>

   

                        <hr>

                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/clientes') }}" class="btn bg-gradient-secondary"> Volver</a>
                                        
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