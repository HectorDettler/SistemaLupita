@extends('adminlte::page')

@section('title', 'Menu de Salidas')

@section('content_header')
    <h1>Detalles</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del registro </h3>
                </div>

                <div class="card-body">

                    
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Detalle</label>
                                    <p>{{ $salida->detalle_salida }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Importe</label>
                                    <p>{{ $salida->importe_salida }}</p>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Fecha</label>
                                    <p>{{ $salida->created_at }}</p>
                                </div>
                            </div>

                        </div>

   

                        <hr>

                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/salidas') }}" class="btn bg-gradient-secondary"> Volver</a>
                                        
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