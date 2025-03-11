@extends('adminlte::page')

@section('title', 'Menu de Marcas')

@section('content_header')
    <h1>Registro de Marcas</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('/admin/marcas/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre de la Marca</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                                    @error('name')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                <label for="categorias">Categorías:</label>
                                <div class="form-group">
                                    @foreach ($categorias as $categoria)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="categorias[]" value="{{ $categoria->id }}" id="categoria{{ $categoria->id }}">
                                            <label class="form-check-label" for="categoria{{ $categoria->id }}">
                                                {{ $categoria->name }}
                                            </label>
                                        </div>

                                        
                                    @endforeach
                                </div>

                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
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
    
@stop