@extends('adminlte::page')

@section('title', 'Menu Principal')

@section('content_header')
    <h1>{{ $configuracion->nombre_empresa  }}</h1>
    <hr>
@stop

@section('content')
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning zoomP">
                    <div class="inner">
                        <h3>{{ $total_productos }}</h3>

                        <p><b>Productos Registrados</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <a href="{{ url('/admin/productos')}}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info zoomP">
                    <div class="inner">
                        <h3>{{ $total_marcas }}</h3>

                        <p><b>Marcas Registradas</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="{{ url('/admin/marcas')}}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success zoomP">
                    <div class="inner">
                        <h3>{{ $total_categorias }}</h3>

                        <p><b>Categorias Registradas</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tags"></i>
                    </div>
                    <a href="{{ url('/admin/categorias')}}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary zoomP">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>

                        <p><b>Usuarios Registrados</b></p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ url('/admin/usuarios')}}" class="small-box-footer">Mas Informacion <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            
        </div>

        

        
@stop

@section('css')
    
@stop

@section('js')
    
@stop