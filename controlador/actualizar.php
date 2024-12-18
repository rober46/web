<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar datos del formulario
    $nombre_empresa = $_POST['nombre_empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];
    $direccion_empresa = $_POST['direccion_empresa'];

    // Mostrar datos actualizados
    echo "<h2>Información de la empresa actualizada:</h2>";
    echo "<p><strong>Nombre de la empresa:</strong> " . htmlspecialchars($nombre_empresa) . "</p>";
    echo "<p><strong>Teléfono de la empresa:</strong> " . htmlspecialchars($telefono_empresa) . "</p>";
    echo "<p><strong>Dirección de la empresa:</strong> " . htmlspecialchars($direccion_empresa) . "</p>";
} else {
    echo "Error al procesar la solicitud.";
}
?>
