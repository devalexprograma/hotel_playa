<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Hotel Playa del Carmen - Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="images/1709280426386.jpg" type="image/x-icon">
  <style>
    /* Estilos personalizados */
    .navbar-custom {
      background-color: #007bff; /* Color azul */
    }
    .navbar-custom .navbar-brand {
      font-size: 24px; /* Tamaño de la letra para la marca */
    }
    .card-title {
      font-size: 24px; /* Tamaño de la letra para los títulos de las tarjetas */
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
      <a class="navbar-brand mx-auto" href="#">Hotel Playa del Carmen</a>
    </div>
  </nav>

  <div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Registrar Huésped</h5>
            <p class="card-text">Formulario para registrar nuevos huéspedes.</p>
            <a href="registrar_huesped.php" class="btn btn-primary">Ir</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Lista de Huéspedes</h5>
            <p class="card-text">Lista de todos los huéspedes registrados.</p>
            <a href="listar_huespedes.php" class="btn btn-primary">Ir</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Habitaciones Disponibles</h5>
            <p class="card-text">Información sobre las habitaciones disponibles.</p>
            <a href="habitaciones_disponibles.php" class="btn btn-primary">Ir</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Venta de Productos</h5>
            <p class="card-text">Catálogo de productos disponibles para la venta.</p>
            <a href="#" class="btn btn-primary">Ir</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS y Popper.js (requerido para los componentes de Bootstrap) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
