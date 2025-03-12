@extends('adminlte::page')

@section('title', 'Editar Marcas')

@section('content_header')
    <h1>Editar Categoria</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('/admin/marcas',$marca->id) }}" method="post">
                        @csrf
                        @method ('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre de la Marca</label>
                                    <input type="text" class="form-control" value="{{ $marca->name}}" name="name" required>
                                    @error('name')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="categorias">Seleccionar Categorías</label>
                                    @foreach ($categorias as $categoria)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="categorias[]" value="{{ $categoria->id }}" 
                                                id="categoria{{ $categoria->id }}"
                                                {{ $marca->categorias->contains($categoria->id) ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="categoria{{ $categoria->id }}">
                                                {{ $categoria->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

            
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop