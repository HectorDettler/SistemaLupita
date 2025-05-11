@extends('adminlte::page')

@section('title', 'Menu de Cliente')

@section('content_header')
    <h1>Registro de Cliente</h1>
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

                    <form action="{{ url('/admin/clientes/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre_cliente">Nombre y Apellido</label>
                                    <input type="text" class="form-control" value="{{ old('nombre_cliente') }}" name="nombre_cliente" required>
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
                                    <input type="text" class="form-control" value="{{ old('celular_cliente') }}" name="celular_cliente" required>
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
                                    <input type="text" class="form-control" value="{{ old('email_cliente') }}" name="email_cliente" required>
                                    @error('email_cliente')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="custom-control custom-checkbox">
                                <input type="hidden" name="aprobado_cliente" value="0">
                                <input type="checkbox" class="custom-control-input" id="aprobado_cliente" name="aprobado_cliente" value="1" {{ old('aprobado_cliente') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="aprobado_cliente">Activo</label>
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