@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')

@section('content')



<section class="productos-destacados" id="coleccion">
    <h2>Productos En Oferta</h2>
    <div class="productos-grid">
        @foreach ($productos as $producto)
            <div class="producto-card">
                <img src="{{ asset('storage/' . $producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}">
                <div class="card-body">
        <h3 class="card-title">{{ $producto->nombre_producto }}</h3>
        <p class="card-text precio">${{ number_format($producto->precio_oferta_producto, 2) }}</p>
        <a href="{{ url('/productos',$producto->id) }}" class="btn ver-mas">Ver Detalles</a>
    </div>
            </div>
        @endforeach
    </div>
</section>


@endsection
