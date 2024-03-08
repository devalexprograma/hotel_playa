<?php
// Incluir archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $fechaHora = gmdate('Y-m-d H:i:s', time() - 5 * 3600); // Obtener fecha y hora actual
    $nombre = $_POST['nombre'];
    $numPersonas = $_POST['numPersonas'];
    $numDias = $_POST['numDias'];
    $totalPagar = $_POST['totalPagar'];
    $numHabitacion = $_POST['numHabitacion'];
    $quienRecibio = $_POST['quienRecibio'];

    // Preparar la consulta SQL para insertar el registro del huésped
    $sql_insertar_huesped = "INSERT INTO huespedes (fecha_hora, nombre, num_personas, num_dias, total_pagar, num_habitacion, quien_recibio) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Preparar la declaración
    $stmt_insertar = $conn->prepare($sql_insertar_huesped);

    // Vincular los parámetros
    $stmt_insertar->bind_param("ssiiiss", $fechaHora, $nombre, $numPersonas, $numDias, $totalPagar, $numHabitacion, $quienRecibio);

    // Ejecutar la consulta
    if ($stmt_insertar->execute()) {
        // Actualizar el estado de la habitación a 'ocupado'
        $sql_actualizar_estado = "UPDATE habitaciones SET estado = 'ocupado' WHERE num_habitacion = ?";

        // Preparar la declaración
        $stmt_actualizar = $conn->prepare($sql_actualizar_estado);

        // Vincular el parámetro
        $stmt_actualizar->bind_param("i", $numHabitacion);

        // Ejecutar la consulta
        $stmt_actualizar->execute();

        // Cerrar la declaración
        $stmt_insertar->close();

        // Cerrar la conexión
        $conn->close();

        // Mostrar modal de éxito y redirigir
        echo "<!DOCTYPE html>
        <html lang='es'>
        
        <head>
            <meta charset='UTF-8'>
            <title>Registro Exitoso</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <!-- Bootstrap CSS -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
            <!-- CSS personalizado -->
            <link href='css/style.css' rel='stylesheet'>
            <link rel='icon' href='images/1709280426386.jpg' type='image/x-icon'>
        </head>
        
        <body>
            <!-- Modal de éxito -->
            <div class='modal fade show' id='registroExitosoModal' tabindex='-1' aria-labelledby='registroExitosoModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='registroExitosoModalLabel'>Registro Exitoso</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            ¡El huésped ha sido registrado exitosamente!
                        </div>
                        <div class='modal-footer'>
                            <a href='listar_huespedes.php' class='btn btn-primary'>Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Bootstrap JS y Popper.js (requerido para los componentes de Bootstrap) -->
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
        
            <!-- Script para mostrar modal de éxito -->
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var myModal = new bootstrap.Modal(document.getElementById('registroExitosoModal'), {
                        keyboard: false
                    });
                    myModal.show();
                });
            </script>
        </body>
        
        </html>";
        exit();
    } else {
        echo "Error al guardar los datos: " . $stmt_insertar->error;
    }
} else {
    // Redirigir si se intenta acceder directamente a procesar_registro.php
    header("Location: registrar_huesped.php");
    exit();
}
?>
