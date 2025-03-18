@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')



@section('content')

    <main class="producto-detalle">
    
        <div class="producto-container">
            <div class="producto-imagenes">
                <div class="imagen-principal">
                <img src="{{ asset('storage/'.$productos->imagen_producto) }}"  id="imagen-principal" alt="imagen">
                </div>
            </div>
            <div class="producto-info-detallada">
            
                <h1 id="producto-nombre">{{ $productos->nombre_producto}}</h1>
                <div class="producto-rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    
                </div>
                <p class="precio-detalle">$59.99</p>
                <div class="producto-descripcion">
                    <p>{{ $productos->descripcion_producto}}</p>
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
                        <i class="fas fa-shield-alt"></i>
                        <span>Garantía de calidad</span>
                    </div>
                    
                </div>
            </div>
           
        </div>
       
    </main>
  
@endsection