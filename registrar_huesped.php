<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hotel Playa del Carmen - Registrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personalizado -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/1709280426386.jpg" type="image/x-icon">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-center">
        <div class="container">
            <a class="navbar-brand" href="#">Hotel Playa del Carmen</a>
        </div>
    </nav>

    <!-- Contenido del formulario -->
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Registrar Huésped</h5>
                <form action="procesar_registro.php" method="post" id="registroForm">
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha y Hora</label>
                        <input type="text" class="form-control" id="fecha"
                            value="<?php echo gmdate('d-m-Y h:i:s A', time() - 5 * 3600); ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="numPersonas" class="form-label">Número de Personas</label>
                        <input type="number" class="form-control" name="numPersonas" id="numPersonas" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="numDias" class="form-label">Número de Días</label>
                        <input type="number" class="form-control" name="numDias" id="numDias" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="numHabitacion" class="form-label">Número de Habitación</label>
                        <select class="form-select" id="numHabitacion" name="numHabitacion" required>
                            <option value="">Selecciona una habitación</option>
                            <?php
                            // Incluir archivo de conexión a la base de datos
                            include 'conexion.php';

                            // Consulta para obtener las habitaciones disponibles con el número de camas
                            $sql_habitaciones = "SELECT num_habitacion, num_camas FROM habitaciones WHERE estado = 'disponible'";
                            $result_habitaciones = $conn->query($sql_habitaciones);

                            if ($result_habitaciones->num_rows > 0) {
                                while ($row = $result_habitaciones->fetch_assoc()) {
                                    $numHabitacion = $row['num_habitacion'];
                                    $numCamas = $row['num_camas'];
                                    echo "<option value='$numHabitacion'>Habitación $numHabitacion ($numCamas Cama";
                                    if ($numCamas > 1) {
                                        echo "s";
                                    }
                                    echo ")</option>";
                                }
                            } else {
                                echo "<option value='' disabled>No hay habitaciones disponibles</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quienRecibio" class="form-label">Quién Recibió el Dinero</label>
                        <input type="text" class="form-control" name="quienRecibio" id="quienRecibio" required>
                    </div>
                    <div class="mb-3">
                        <label for="totalPagar" class="form-label">Total a Pagar</label>
                        <input type="text" class="form-control" name="totalPagar" id="totalPagar" readonly>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS y Popper.js (requerido para los componentes de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- JavaScript para calcular total a pagar -->
    <script src="js/calcularTotal.js"></script>

</body>

</html>

