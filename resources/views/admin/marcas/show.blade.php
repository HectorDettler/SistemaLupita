@extends('adminlte::page')

@section('title', 'Detalles Marcas')

@section('content_header')
    <h1>Detalles</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos de la marca </h3>
                </div>

                <div class="card-body">

                    
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre de la marca</label>
                                    <p>{{ $marca->name }}</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Disponible en estas Categorias</label>
                                    <ul>
                                        @foreach ($marca->categorias as $categoria)
                                            <li>{{ $categoria->name }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            

                            

                        </div>
   

                        <hr>

                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/marcas') }}" class="btn bg-gradient-secondary"> Volver</a>
                                        
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