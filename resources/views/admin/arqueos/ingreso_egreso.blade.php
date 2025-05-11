@extends('adminlte::page')

@section('title', 'Menu de Cliente')

@section('content_header')
    <h1>Registro de ingreso-egreso</h1>
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

                    <form action="{{ url('/admin/arqueos/create_ingreso_egreso') }}" method="post">
                        @csrf
                        <input type="text" value="{{ $arqueo->id }}" name="id" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_apertura_arqueo">Fecha de Apertura</label>
                                    <input type="datetime-local" class="form-control" value="{{ $arqueo->fecha_apertura_arqueo}}" name="fecha_apertura_arqueo" disabled>
                                    @error('fecha_apertura_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tipo_movimiento">Tipo de Movimiento</label>
                                    <select name="tipo_movimiento" id="" class="form-control" required>
                                        <option value="">Seleccione una opcion</option>
                                        <option value="INGRESO">INGRESO</option>
                                        <option value="EGRESO">EGRESO</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto_movimiento">Monto</label>
                                    <input type="text" class="form-control" value="{{ old('monto_movimiento')}}" name="monto_movimiento" >
                                    @error('monto_movimiento')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="detalle_movimiento">Detalle</label>
                                    <input type="text" class="form-control" value="{{ old('detalle_movimiento')}}" name="detalle_movimiento" >
                                    @error('detalle_movimiento')
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