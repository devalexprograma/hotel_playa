<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Consulta para obtener la lista de huéspedes
$sql_huespedes = "SELECT id, fecha_hora, nombre, num_personas, num_dias, total_pagar FROM huespedes";
$result_huespedes = $conn->query($sql_huespedes);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Huéspedes</title>
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

    <!-- Contenido de la lista de huéspedes -->
    <div class="container mt-4">
        <h2 class="mb-4">Lista de Huéspedes</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Número de Personas</th>
                        <th>Número de Días</th>
                        <th>Total a Pagar</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Salida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result_huespedes->num_rows > 0) {
                        while ($row = $result_huespedes->fetch_assoc()) {
                            $id = $row['id'];
                            $nombre = $row['nombre'];
                            $numPersonas = $row['num_personas'];
                            $numDias = $row['num_dias'];
                            $totalPagar = $row['total_pagar'];
                            $fechaEntrada = $row['fecha_hora']; // Aquí debería ser la fecha de entrada
                            $fechaSalida = date('Y-m-d H:i:s', strtotime($fechaEntrada . " + $numDias days")); // Calcular la fecha de salida

                            echo "<tr>
                                    <td>$id</td>
                                    <td>$nombre</td>
                                    <td>$numPersonas</td>
                                    <td>$numDias</td>
                                    <td>$totalPagar</td>
                                    <td>$fechaEntrada</td>
                                    <td>$fechaSalida</td>
                                    <td>
                                        <a href='marcar_salida.php?id=$id' class='btn btn-danger'>Marcar Salida</a>
                                        <a href='renovar_huesped.php?id=$id' class='btn btn-warning'>Renovar</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay huéspedes registrados.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS y Popper.js (requerido para los componentes de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
// Cerrar la conexión
$conn->close();
?>
