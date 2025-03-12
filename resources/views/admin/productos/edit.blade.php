@extends('adminlte::page')

@section('title', 'Menú de Productos')

@section('content_header')
    
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">  
                    <h3 class="card-title">Ingrese los datos del producto</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('/admin/productos',$producto->id) }}" method="post" enctype="multipart/form-data">
                        
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre_producto">Nombre del Producto <b>*</b></label>
                                    <input type="text" class="form-control" value="{{ $producto->nombre_producto}}" name="nombre_producto" id="nombre_producto" required>
                                    @error('nombre_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>

                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo_producto">Código del Producto <b>*</b></label>
                                    <input type="text" class="form-control" value="{{ $producto->codigo_producto}}" name="codigo_producto" id="codigo_producto" required>
                                    @error('codigo_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion_producto">Descripción del Producto</label>
                                    <textarea class="form-control" name="descripcion_producto" id="descripcion_producto">{{ $producto->descripcion_producto}}</textarea>
                                    @error('descripcion_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_producto">Stock Actual <b>*</b></label>
                                    <input type="number" class="form-control" value="{{ $producto->stock_producto}}" name="stock_producto" id="stock_producto" required>
                                    @error('stock_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_min_producto">Stock Mínimo <b>*</b></label>
                                    <input type="number" class="form-control" value="{{ $producto->stock_min_producto}}" name="stock_min_producto" id="stock_min_producto" required>
                                    @error('stock_min_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock_max_producto">Stock Máximo <b>*</b></label>
                                    <input type="number" class="form-control" value="{{ $producto->stock_max_producto}}" name="stock_max_producto" id="stock_max_producto" required>
                                    @error('stock_max_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio_venta_producto">Precio de Venta <b>*</b></label>
                                    <input type="text" class="form-control" value="{{ $producto->precio_venta_producto}}" name="precio_venta_producto" id="precio_venta_producto" step="0.01" required>
                                    @error('precio_venta_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio_oferta_producto">Precio de Oferta</label>
                                    <input type="text" class="form-control" value="{{ $producto->precio_oferta_producto}}" name="precio_oferta_producto" id="precio_oferta_producto" step="0.01">
                                    @error('precio_oferta_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_vencimiento_producto">Fecha de Vencimiento <b>*</b></label>
                                    <input type="date" class="form-control" value="{{ $producto->fecha_vencimiento_producto}}" name="fecha_vencimiento_producto" id="fecha_vencimiento_producto">
                                    @error('fecha_vencimiento_producto')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria_id">Categoría <b>*</b></label>

                                    <select class="form-control" name="categoria_id" id="categoria_id" required>
                                        <option value="">Selecciona una Categoría</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}" {{ $categoria->id == $producto->id_categoria ? 'selected' : '' }}>
                                                {{ $categoria->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="marca_id">Marca <b>*</b></label>
                                    <select class="form-control" name="marca_id" id="marca_id" required>
                                        <option value="">Selecciona una Marca</option>
                                        @foreach ($marcas as $marca)
                                            <option value="{{ $marca->id }}" {{ $marca->id == $producto->id_marca ? 'selected' : '' }}>
                                                {{ $marca->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label for="name">Imagen del producto</label>
                                    <input type="file" id="file" name="imagen_producto" accept=".jpg, .jpeg, .png" class="form-control" onchange="archivo(event)">

                                    @error('imagen_producto')
                                        <small>{{$message}}</small>
                                    @enderror
                                    <br>
                                    <center><output id="list"> <img src="{{ asset('storage/'.$producto->imagen_producto) }}" width="256px" alt="imagen"> </output></center>
                                    <script>
                                        function archivo(evt){
                                            var files=evt.target.files;

                                            for(var i=0, f; f=files[i];i++){

                                                if(!f.type.match('image.*')){
                                                    continue;
                                                }
                                                var reader= new FileReader();
                                                reader.onload =(function (theFile){
                                                    return function (e){
                                                        //insertamos la imagen
                                                        document.getElementById("list").innerHTML =['<img class="thumb thumbnail" src="',e.target.result,'" width="30%" title="',escape(theFile.name),'"/>'].join('');
                                                    }
                                                })(f);
                                                reader.readAsDataURL(f);

                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                        

                        <hr>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/productos') }}" class="btn bg-gradient-secondary"> Cancelar</a>
                                    <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Guardar Cambios</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
