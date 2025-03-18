@extends('adminlte::page')

@section('title', 'Menu de Salidas')

@section('content_header')
    <h1>Registro de Salida</h1>
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

                    <form action="{{ url('/admin/salidas/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle_salida">Detalle</label>
                                    <textarea class="form-control"  value="{{ old('detalle_salida') }}" name="detalle_salida" id="detalle_salida"></textarea>
                                    @error('detalle_salida')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="importe_salida">Importe de salida</label>
                                    <input type="text" class="form-control" value="{{ old('importe_salida') }}" name="importe_salida" id="importe_salida" step="0.01" required>
                                    @error('importe_salida')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-gradient-primary"><i class="fas fa-save"></i> Guardar Registro</button>
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