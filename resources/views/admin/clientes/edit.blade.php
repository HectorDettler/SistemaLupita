@extends('adminlte::page')

@section('title', 'Menu de Categorias')

@section('content_header')
    
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

                    <form action="{{ url('/admin/clientes',$cliente->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cliente">Nombre y Apellido</label>
                                    <input type="text" class="form-control" value="{{ $cliente->nombre_cliente }}" name="nombre_cliente" required>
                                    @error('nombre_cliente')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="celular_cliente">Celular</label>
                                    <input type="text" class="form-control" value="{{ $cliente->celular_cliente }}" name="celular_cliente" required>
                                    @error('celular_cliente')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email_cliente">Email</label>
                                    <input type="text" class="form-control" value="{{ $cliente->email_cliente }}" name="email_cliente" required>
                                    @error('email_cliente')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="aprobado_cliente" value="0">
                                <input type="checkbox" class="custom-control-input" id="aprobado_cliente" name="aprobado_cliente" value="1" 
                                    {{ old('aprobado_cliente', $cliente->aprobado_cliente) ? 'checked' : '' }}>
                                <label class="custom-control-label" for="aprobado_cliente">Activo</label>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/clientes') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Actualizar Datos</button>
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