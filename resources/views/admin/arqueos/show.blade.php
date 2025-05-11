@extends('adminlte::page')

@section('title', 'Menu de Cliente')

@section('content_header')
    <h1>Datos Registrados</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos </h3>
                </div>

                <div class="card-body">

                    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_apertura_arqueo">Fecha de Apertura</label>
                                    <input type="datetime-local" class="form-control" value="{{ $arqueo->fecha_apertura_arqueo }}" name="fecha_apertura_arqueo" disabled>
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
                                    <input type="text" class="form-control" value="{{ $arqueo->monto_inicial_arqueo }}" name="monto_inicial_arqueo" disabled>
                                    @error('monto_inicial_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fecha_cierre_arqueo">Fecha de Cierre</label>
                                    <input type="datetime-local" class="form-control" value="{{ $arqueo->fecha_cierre_arqueo }}"  disabled>
                                    @error('fecha_cierre_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="monto_final_arqueo">Monto Inicial</label>
                                    <input type="text" class="form-control" value="{{ $arqueo->monto_final_arqueo }}" name="monto_final_arqueo" disabled>
                                    @error('monto_final_arqueo')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        

                        
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/arqueos') }}" class="btn btn-secondary">Volver</a>
                                        
                                    </div>
                            </div>

                        </div>

                    
                   
              </div>


              
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Ingresos </h3>
                    
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Detalle</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $contador= 1;
                                $suma_monto_ingreso=0;
                            ?>
                            @foreach ( $movimientos as $movimiento)

                                @if($movimiento->tipo_movimiento =="INGRESO")
                                    @php
                                        $suma_monto_ingreso += $movimiento->monto_movimiento
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">{{ $contador++  }}</td>
                                        <td>{{ $movimiento->detalle_movimiento }}</td>
                                        <td>{{ $movimiento->monto_movimiento }}</td>
                                    </tr>
                                @endif
                                
                               
                            
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <td colspan="2" style="text-align: center"><b>Total:</b></td>
                            <td style="text-align: center"><b>{{ $suma_monto_ingreso }}</b></td>

                        </tfoot>

                    </table>
                        
                </div>
            </div>
            
        </div>

        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Egresos </h3>
                    
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-sm table-striped table-hover">

                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Detalle</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $contador2= 1;
                                $suma_monto_egreso=0;
                            ?>
                            @foreach ( $movimientos as $movimiento)

                                @if($movimiento->tipo_movimiento =="EGRESO")
                                    @php
                                        $suma_monto_egreso += $movimiento->monto_movimiento
                                    @endphp
                                    <tr>
                                        <td style="text-align: center">{{ $contador2++  }}</td>
                                        <td>{{ $movimiento->detalle_movimiento }}</td>
                                        <td>{{ $movimiento->monto_movimiento }}</td>
                                    </tr>
                                @endif
                                
                               
                            
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <td colspan="2" style="text-align: center"><b>Total:</b></td>
                            <td style="text-align: center"><b>{{ $suma_monto_egreso }}</b></td>

                        </tfoot>

                    </table>
                        
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