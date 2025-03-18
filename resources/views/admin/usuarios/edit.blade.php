@extends('adminlte::page')

@section('title', 'Menu de Usuarios')

@section('content_header')
    <h1>Editar Usuarios</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Ingrese los datos </h3>
                </div>

                <div class="card-body">

                    <form action="{{ url('/admin/usuarios',$usuario->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre y Apellido del Usuario</label>
                                    <input type="text" class="form-control" value="{{ $usuario->name }}" name="name" required>
                                    @error('name')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ $usuario->email }}" name="email" required>
                                    @error('email')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password') }}" name="password" >
                                    @error('password')
                                    <small style"">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" value="{{ old('password_confirmation') }}" name="password_confirmation" >
                                    
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="role">Rol del usuario</label>
                                    <select name="role" id="" class="form-control">
                                        @foreach ( $roles as $role )
                                            <option value="{{ $role->name }}"{{ $role->name == $usuario->roles->pluck('name')->implode(', ') ? 'selected':'' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>


                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{ url('/admin/usuarios') }}" class="btn bg-gradient-secondary"> Cancelar</a>
                                        <button type="submit" class="btn bg-gradient-success"><i class="fas fa-save"></i> Guardar Cambios</button>
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