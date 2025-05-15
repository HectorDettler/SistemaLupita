@extends('adminlte::page')

@section('title', 'Menu de Permisos')

@section('content_header')
    <h1>Registro de Permiso</h1>
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

                    <form action="{{ url('/admin/permisos/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre del Permiso</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" required>
                                    @error('name')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-primary"><i class="fas fa-save"></i> Registrar</button>
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