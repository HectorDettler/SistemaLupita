@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')



@section('content')

<section class="hero">
            <div class="hero-content">
                <h2>Nueva Colección Primavera</h2>
                <p>Descubre las últimas tendencias en moda femenina</p>
                <a href="#coleccion" class="cta-button">Ver Colección</a>
            </div>
        </section>

        <section class="productos-destacados">
            <h2>Productos En Oferta</h2>
            <div class="productos-grid">
            @foreach($productos as $producto)
                <div class="producto-card">
                    <img src="{{ asset('storage/'.$producto->imagen_producto) }}"  id="imagen-principal" alt="imagen">
                    <div class="producto-info">
                        <h3>{{ $producto->nombre_producto}}</h3>
                        <p class="precio">$59.99</p>
                        <a href="{{ url('/productos',$producto->id) }}" class="ver-mas">Ver Detalles</a>
                    </div>
                </div>
            @endforeach
            </div>
        </section>
  
@endsection