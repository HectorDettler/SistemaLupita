@extends('adminlte::page')

@section('title', 'Configuración / Editar')

@section('content_header')
    <h1>Configuración / Editar</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{-- Card Box --}}
            <div class="card card-outline card-success">
                <div class="card-header {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none">
                        Datos Registrados
                    </h3>
                </div>

                {{-- Card Body --}}
                <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                    <form action="{{ route('admin.configuracion.update', $configuracion->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre_empresa">Nombre del Negocio</label>
                                            <input type="text" value="{{ $configuracion->nombre_empresa }}" name="nombre_empresa" class="form-control" required>
                                            @error('nombre_empresa')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="direccion_empresa">Dirección</label>
                                            <input type="text" value="{{ $configuracion->direccion_empresa }}" name="direccion_empresa" class="form-control" required>
                                            @error('direccion_empresa')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="correo_empresa">Correo Electrónico</label>
                                            <input type="email" value="{{ $configuracion->correo_empresa }}" name="correo_empresa" class="form-control" required>
                                            @error('correo_empresa')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefono_empresa">Teléfono</label>
                                            <input type="text" value="{{ $configuracion->telefono_empresa }}" name="telefono_empresa" class="form-control" required>
                                            @error('telefono_empresa')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-success btn-block">Actualizar Datos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- Card Footer --}}
                @hasSection('auth_footer')
                    <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                        @yield('auth_footer')
                    </div>
                @endif
            </div>
        </div>
    </div>
@stop

@section('css')

@stop


@section('js')
    {{-- Agregar scripts personalizados aquí si es necesario --}}
@stop
