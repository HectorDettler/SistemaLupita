@extends('adminlte::page')

@section('title', 'Menu de Compras')

@section('content_header')
    <h1>Registro de Compra</h1>
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

                    <form action="{{ url('/admin/compras/create') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle_compra">Detalle</label>
                                    <textarea class="form-control"  value="{{ old('detalle_compra') }}" name="detalle_compra" id="detalle_compra"></textarea>
                                    @error('detalle_compra')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="importe_">Importe de Compra</label>
                                    <input type="text" class="form-control" value="{{ old('importe_compra') }}" name="importe_compra" id="importe_compra" step="0.01" required>
                                    @error('importe_compra')
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