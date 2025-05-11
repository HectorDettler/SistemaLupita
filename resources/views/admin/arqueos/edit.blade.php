@extends('adminlte::page')

@section('title', 'Menu de Cliente')

@section('content_header')
    <h1>Edicion de Arqueo</h1>
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

                    <form action="{{ url('/admin/arqueos',$arqueo->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_apertura_arqueo">Fecha de Apertura</label>
                                    <input type="datetime-local" class="form-control" value="{{ $arqueo->fecha_apertura_arqueo}}" name="fecha_apertura_arqueo" required>
                                    @error('fecha_apertura_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto_inicial_arqueo">Monto Inicial</label>
                                    <input type="text" class="form-control" value="{{ $arqueo->monto_inicial_arqueo }}" name="monto_inicial_arqueo">
                                    @error('monto_inicial_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/arqueos') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Actualizar</button>
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