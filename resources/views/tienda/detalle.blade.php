@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')



@section('content')

    <main class="producto-detalle">
    @foreach($productos as $producto)
        <div class="producto-container">
            <div class="producto-imagenes">
                <div class="imagen-principal">
                <img src="{{ asset('storage/'.$producto->imagen_producto) }}"  id="imagen-principal" alt="imagen">
                </div>
            </div>
            <div class="producto-info-detallada">
            
                <h1 id="producto-nombre">{{ $producto->nombre_producto}}</h1>
                <div class="producto-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <span>(4.5 - 24 reseñas)</span>
                </div>
                <p class="precio-detalle">$59.99</p>
                <div class="producto-descripcion">
                    <p>{{ $producto->descripcion_producto}}</p>
                </div>
                <div class="selector-talla">
                    <h3>Talla</h3>
                    <div class="tallas">
                        <button class="talla-btn">XS</button>
                        <button class="talla-btn">S</button>
                        <button class="talla-btn">M</button>
                        <button class="talla-btn">L</button>
                        <button class="talla-btn">XL</button>
                    </div>
                </div>
                <div class="selector-cantidad">
                    <h3>Cantidad</h3>
                    <div class="cantidad-control">
                        <button class="cantidad-btn" id="decrementar">-</button>
                        <input type="number" value="1" min="1" max="10" id="cantidad">
                        <button class="cantidad-btn" id="incrementar">+</button>
                    </div>
                </div>
                <div class="acciones-producto">
                    <button class="añadir-carrito">Añadir al Carrito</button>
                    <button class="comprar-ahora">Comprar Ahora</button>
                </div>
                <div class="detalles-adicionales">
                    <div class="detalle">
                        <i class="fas fa-truck"></i>
                        <span>Envío gratis en compras mayores a $99</span>
                    </div>
                    <div class="detalle">
                        <i class="fas fa-undo"></i>
                        <span>30 días para devoluciones</span>
                    </div>
                    <div class="detalle">
                        <i class="fas fa-shield-alt"></i>
                        <span>Garantía de calidad</span>
                    </div>
                </div>
            </div>
           
        </div>
    @endforeach     
    </main>
  
@endsection