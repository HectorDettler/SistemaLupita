<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/producto.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @stack('styles')
</head>
<body>
    <header class="header">
        <nav class="nav-container">
            <div class="logo">
                <img src="{{ asset('images/logo-recortado.jpg') }}" alt="Logo" class="logo-img">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{ url('/') }}">Inicio</a></li>
                    <li><a href="{{ url('/productos') }}">Productos</a></li>
                    <li><a href="#ofertas">Ofertas</a></li>
                </ul>
            </div>
            <div class="user-actions">
                @auth
                    <a href="" class="login-btn">
                        <i class="fas fa-user"></i> Mi Cuenta
                    </a>
                @else
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="fas fa-user"></i> Iniciar Sesión
                    </a>
                @endauth
                <a href="" class="cart-btn">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">5</span>
                </a>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Lupita Almacen de Mujeres</h3>
                <p>Tu destino de moda favorito para encontrar las últimas tendencias en ropa y accesorios para mujeres.</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="sobre-nosotros.html">Sobre Nosotros</a></li>
                    <li><a href="contacto.html">Contacto</a></li>
                    <li><a href="politica-privacidad.html">Política de Privacidad</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contacto</h3>
                <p><i class="fas fa-map-marker-alt"></i> Av. Principal 123, Ciudad</p>
                <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                <p><i class="fas fa-envelope"></i> info@bellaboutique.com</p>
            </div>
            <div class="footer-section">
                <h3>Síguenos</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2018 Lupita. Todos los derechos reservados.</p>
        </div>
       
    </footer>

    @stack('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>