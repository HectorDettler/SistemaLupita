@extends('layouts.tienda')

@section('title', 'Tienda - Lupita')



@section('content')

<section class="hero">
            <div class="swiper mySwiper w-full h-full">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    <img src="{{ asset('images/a1.jpg') }}" alt="Imagen 1" class="swiper-image">

                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/a2.png') }}" alt="Colección Primavera 2" class="swiper-image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/a3.png') }}" alt="Colección Primavera 3" class="swiper-image">
                    </div>
                </div>
                <!-- Botones de navegación -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>

                
            </div>
</section>

<section class="productos-destacados" id="coleccion">
    <h2>Productos Destacados</h2>
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








<!-- SwiperJS -->
<!-- Enlace a SwiperJS (CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 1500,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
</script>

<section class="sobre-nosotros">
    <img src="{{ asset('images/a1.jpg') }}" alt="Sobre Nosotros" class="img-fondo">
    <div class="content fade-in">
        <h1>Sobre Nosotros</h1>
        <p>
  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in metus non erat porta placerat. Sed feugiat, sapien ac facilisis interdum, lorem risus gravida neque, in tristique purus metus a sem.
</p>
    </div>
</section>

<script>
document.addEventListener("scroll", function () {
    const fondo = document.querySelector(".img-fondo");
    const scrolled = window.scrollY;
    fondo.style.transform = `scale(1.05) translateY(${scrolled * 0.1}px)`;
});
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const elementos = document.querySelectorAll(".fade-in");

        function mostrarElemento() {
            elementos.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top <= window.innerHeight - 100) {
                    el.classList.add("visible");
                }
            });
        }

        window.addEventListener("scroll", mostrarElemento);
        mostrarElemento(); // Por si ya está visible al cargar
    });
</script>

<!-- Seccion Map -->
<section class="ubicacion-tienda mt-10 mb-10 px-4">
    <h2 class="text-2xl font-bold text-center mb-6">¿Dónde estamos?</h2>

    <div style="width: 50%; height: 300px; margin: 0 auto;">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1447.1074556571264!2d-58.75341364007158!3d-30.384441386631725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x944d359db5f45b03%3A0x860ad40a06b4d06a!2sLupita%20Almac%C3%A9n%20de%20Mujeres!5e0!3m2!1ses!2sar!4v1746574856496!5m2!1ses!2sar"
            width="100%"
            height="100%"
            style="border:0; border-radius: 10px;"
            allowfullscreen=""
            loading="lazy">
        </iframe>
    </div>
</section>
  


@endsection