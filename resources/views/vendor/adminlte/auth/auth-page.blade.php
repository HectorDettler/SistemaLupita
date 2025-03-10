@extends('adminlte::master')

@php
    $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home');
    if (config('adminlte.use_route_url', false)) {
        $dashboard_url = $dashboard_url ? route($dashboard_url) : '';
    } else {
        $dashboard_url = $dashboard_url ? url($dashboard_url) : '';
    }

    $bodyClasses = ($auth_type ?? 'login') . '-page';

    if (! empty(config('adminlte.layout_dark_mode', null))) {
        $bodyClasses .= ' dark-mode';
    }
@endphp

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
        body.login-page, body.register-page {
            background: #fff; 
            color: #444;
        }
        .login-box, .register-box {
            max-width: 400px;
            margin: 2rem auto;
        }
        .card {
            border-radius: 15px;
            box-shadow: 6px 6px 6px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out; 
            border: none; 
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-header {
            background-color: #f06292; 
            color: white;
            border-radius: 15px 15px 0 0;
        }
        .card-footer {
            background-color: #f8bbd0; 
            text-align: center;
        }
        .btn-primary {
            background-color: #ec407a;
            border-color: #ec407a;
        }
        .btn-primary:hover {
            background-color: #d81b60;
            border-color: #d81b60;
        }
        .custom-logo {
            display: block;
            margin: 0 auto 1rem auto;
            width: 70%;
        }
        .company-name {
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color:rgb(0, 0, 0);
            margin-bottom: 1rem; 
            font-family: 'Pacifico', cursive; 
            
        }
                /* Cambiar color de los enlaces dentro del formulario */
        .card a {
            color: #fff !important; /* Establece el color blanco */
            text-decoration: none; /* Elimina el subrayado */
        }

        .card a:hover {
            color:rgb(248, 248, 248) !important; /* Cambiar color en hover (puedes poner el color que prefieras) */
            text-decoration: underline; /* Opcional, si quieres subrayar al pasar el mouse */
        }


        
    </style>
@stop

@section('classes_body'){{ $bodyClasses }}@stop

@section('body')
    <div class="{{ $auth_type ?? 'login' }}-box">
        
       
    
        {{-- Logo --}}
        <center>
            <img src="{{ asset('/images/logo-recortado.jpg') }}" alt="Lupita Logo" class="custom-logo">
        </center>

        <div class="company-name">
            <p>Almacen de mujeres</p> 
        </div>
        
        {{-- Card Box --}}
        <div class="card">

            {{-- Card Header --}}
            @hasSection('auth_header')
                <div class="card-header text-center {{ config('adminlte.classes_auth_header', '') }}">
                    <h3 class="card-title float-none">
                        @yield('auth_header')
                    </h3>
                </div>
            @endif

            {{-- Card Body --}}
            <div class="card-body {{ $auth_type ?? 'login' }}-card-body {{ config('adminlte.classes_auth_body', '') }}">
                @yield('auth_body')
            </div>

            {{-- Card Footer --}}
            @hasSection('auth_footer')
                <div class="card-footer {{ config('adminlte.classes_auth_footer', '') }}">
                    @yield('auth_footer')
                </div>
            @endif

        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
