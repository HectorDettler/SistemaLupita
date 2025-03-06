<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lupita Almacen de Mujeres</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <header class="bg-primary text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
      <h1 class="h3">La Tiendita</h1>
      <nav>
        <a href="/" class="text-white text-decoration-none me-3">Home</a>
        <a href="/productos" class="text-white text-decoration-none me-3">Productos</a>

        <a href="{{ route('login') }}" class="text-white text-decoration-none">Login</a>
      </nav>
    </div>
  </header>

  <main class="container my-4">
    <h2 class="mb-4">Bienvenido a La Tiendita</h2>
    <div class="row">
      <!-- Producto 1 -->
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Producto 1</h5>
            <p class="card-text">Descripción breve del producto.</p>
            <button class="btn btn-primary">Comprar</button>
          </div>
        </div>
      </div>
      <!-- Producto 2 -->
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Producto 2">
          <div class="card-body">
            <h5 class="card-title">Producto 2</h5>
            <p class="card-text">Descripción breve del producto.</p>
            <button class="btn btn-primary">Comprar</button>
          </div>
        </div>
      </div>
      <!-- Producto 3 -->
      <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
          <img src="https://via.placeholder.com/150" class="card-img-top" alt="Producto 3">
          <div class="card-body">
            <h5 class="card-title">Producto 3</h5>
            <p class="card-text">Descripción breve del producto.</p>
            <button class="btn btn-primary">Comprar</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-primary text-white text-center py-3">
    <p>&copy; 2025 La Tiendita. Todos los derechos reservados.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
