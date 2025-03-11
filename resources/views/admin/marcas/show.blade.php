@extends('adminlte::page')

@section('title', 'Dashboard')

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
                                    <label for="name">Nombre de la marca</label>
                                    <p>{{ $marca->name }}</p>
                                </div>
                            </div>

                            

                            

                        </div>

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Disponible en estas Marcas</label>
                                    <p>Aca mostrar las marcas Relacionadas</p>
                                </div>
                            </div>



                        </div>


                       

                        <hr>

                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary"> Volver</a>
                                        
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