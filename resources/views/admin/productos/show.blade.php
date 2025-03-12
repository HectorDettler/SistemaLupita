@extends('adminlte::page')

@section('title', 'Menú de Productos')

@section('content_header')
    <h1>Datos del Productos</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Detalles del Producto</h3>
                </div>

                <div class="card-body">
                    
                        
                        <!-- Fila 1: Información Básica -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">

                                    <label for="nombre_producto">Nombre del Producto <b>*</b></label>
                                    <p>{{ $producto->nombre_producto }}</p>
                                    
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="descripcion_producto">Descripción del Producto</label>
                                    <p>{{ $producto->descripcion_producto }}</p>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="codigo_producto">Código del Producto <b>*</b></label>
                                    <p>{{ $producto->codigo_producto }}</p>
                                </div>
                            </div>
                        </div>
                        
                       
                        <!-- Fila 3: Stock -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_producto">Stock Actual <b>*</b></label>
                                    <br>
                                    <input type="text" style="text-align: center; width: 100px" value="{{ $producto->stock_producto }}" name="" id="" disable>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_min_producto">Stock Mínimo <b>*</b></label>
                                    <br>
                                    <input type="text" style="text-align: center; width: 100px" value="{{ $producto->stock_min_producto }}" name="" id="" disable>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_max_producto">Stock Máximo <b>*</b></label>
                                    <br>
                                    <input type="text" style="text-align: center; width: 100px" value="{{ $producto->stock_max_producto }}" name="" id="" disable>
                                </div>
                            </div>
                        </div>

                        <!-- Fila 4: Precios y Fecha -->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio_venta_producto">Precio de Venta <b>*</b></label>
                                    <br>
                                    <input type="text" style="width: 100px" value="{{ $producto->precio_venta_producto }}" name="" id="" disable>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="precio_oferta_producto">Precio de Oferta</label>
                                    <br>
                                    <input type="text" style="width: 100px" value="{{ $producto->precio_oferta_producto }}" name="" id="" disable>
                                    
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group color-palette-set">
                                    <label for="fecha_vencimiento_producto" >Fecha de Vencimiento <b>*</b></label>
                                    <p class="bg-primary disabled color-palette" style=" width: 100px; text-align:center">{{ $producto->fecha_vencimiento_producto }}</p>
                                </div>
                            </div>

                        </div>


                        <!-- Fila 5: Categoría y Marca -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="categoria_id">Categoría <b>*</b></label>
                                    <p>{{ $producto->categoria->name }}</p>
                                           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="marca_id">Marca <b>*</b></label>
                                    <p>{{ $producto->marca->name }}</p>
                                            
                                </div>
                            </div>
                        </div>

                        <!-- Fila 6: Imagen del Producto -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="form-group" >
                                    <label for="name">Imagen del producto</label>
                                    <img src="{{ asset('storage/'.$producto->imagen_producto) }}" width="100px" alt="imagen">
                                </div>
                            </div>
                        </div>

                        <hr>
                        
                        <!-- Botón de registro -->
                        <div class="row">
                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/productos') }}" class="btn bg-gradient-secondary"> Volver</a>
                                        
                                    </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Agrega tus hojas de estilo personalizadas aquí --}}
@stop

@section('js')

    <script>
        $(document).ready(function() {
            $('#categoria_id').change(function() {
                var categoriaId = $(this).val();

                if (categoriaId) {
                    $.ajax({
                        url: '/lupita/public/admin/get-marcas/' + categoriaId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#marca_id').empty();
                            $('#marca_id').append('<option value="">Selecciona una Marca</option>');
                            
                            $.each(data, function(key, marca) {
                                $('#marca_id').append('<option value="' + marca.id + '">' + marca.name + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log('Error: ' + textStatus); // Tipo de error
                            console.log('Detalles: ' + errorThrown); // Detalles específicos del error
                            console.log('Respuesta completa: ' + jqXHR.responseText); // Cuerpo de la respuesta del servidor
                        }
                    });
                } else {
                    $('#marca_id').empty();
                    $('#marca_id').append('<option value="">Selecciona una Marca</option>');
                }
            });
        });

    </script>

@stop
