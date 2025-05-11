@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')

@section('content')

<!-- Buscador Mejorado -->
<!-- Buscador Mejorado y Responsive -->
<div class="col-12 mb-4">
    <section class="productos-buscador p-4  shadow-lg bg-pink">
        <form method="GET" action="{{ route('productos') }}" id="filtrosForm">
            
            
            <div class="row gy-3">
                <!-- Campo de búsqueda -->
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="query" class="form-label fw-semibold">Buscar producto</label>
                    <div class="input-group">
                        <input type="text" name="query" id="query" class="form-control" placeholder="Ej: Perfume floral..." value="{{ request('query') }}">
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                <!-- Filtro por marca -->
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="marca_id" class="form-label fw-semibold">Marca</label>
                    <select name="marca_id" id="marca_id" class="form-select">
                        <option value="">Todas las marcas</option>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ request('marca_id') == $marca->id ? 'selected' : '' }}>
                                {{ $marca->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Filtro por categoría -->
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="categoria_id" class="form-label fw-semibold">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        <option value="">Todas las categorías</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                {{ $categoria->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones de acción -->
                <div class="col-12 text-end mt-2">
                    <button type="submit" class="btn btn-pink me-2">
                        <i class="fas fa-filter me-1"></i> Aplicar filtros
                    </button>
                    <a href="{{ route('productos') }}" class="btn btn-outline-pink">
                        <i class="fas fa-times me-1"></i> Limpiar
                    </a>
                </div>

            </div>
        </form>
    </section>
</div>


        <!-- Productos debajo del buscador -->
        <div class="col-12">
            <section class="productos-destacados">
                <h2 class="mb-4">Todos Nuestros Productos</h2>
                <div class="row">
                    @foreach ($productos as $producto)
                        <div class="col-md-3 mb-3">
                            <div class="producto-card">
                                <img src="{{ asset('storage/' . $producto->imagen_producto) }}" alt="{{ $producto->nombre_producto }}">
                                <div class="card-body text-center">
                                    <h3 class="card-title">{{ $producto->nombre_producto }}</h3>
                                    <p class="card-text precio">${{ number_format($producto->precio_venta_producto, 2) }}</p>
                                    <a href="{{ url('/productos',$producto->id) }}" class="btn ver-mas">Ver Detalles</a>
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $productos->appends(request()->query())->links() }}
</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
@endsection
@push('css')
    <style>
        .btn-pink {
            background-color: #ff69b4;
            color: white !important;
            border: none;
        }

        .btn-pink:hover {
            background-color: #ff4da6;
            color: white !important;
        }

        .btn-outline-pink {
            background-color: transparent;
            color: #ff69b4 !important;
            border: 1px solid #ff69b4;
        }

        .btn-outline-pink:hover {
            background-color: #ff69b4;
            color: white !important;
        }
        
        /* Paginación personalizada */
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
        }

        .pagination li {
            margin: 0 3px;
        }

        .pagination li a,
        .pagination li span {
            color: #ff69b4; /* Rosa Lupita */
            border: 1px solid #ff69b4;
            padding: 8px 14px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .pagination li.active span,
        .pagination li a:hover {
            background-color: #ff69b4;
            color: white;
            border-color: #ff69b4;
        }

        .pagination li.disabled span {
            color: #ccc;
            border-color: #ccc;
        }

    </style>
@endpush


