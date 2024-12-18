<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<?php
// Incluir conexión a la base de datos
include "../modelo/conexion.php";  // Ajusta la ruta si es necesario

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los contratos desde la base de datos
$sql = "SELECT * FROM contratos";
$contratos = $conexion->query($sql);
?>

<?php
// Incluir conexión a la base de datos

// Obtener ID del contrato
$id = $_GET['contratosid'];

// Consultar el estado actual del contrato
$sql = "SELECT estado FROM contratos WHERE contratosid = $id";
$result = $conexion->query($sql);
$contrato = $result->fetch_assoc();
$estado_actual = $contrato['estado'];

// Cambiar el estado (si es 'Activo', pasa a 'Rechazado' y viceversa)
$nuevo_estado = ($estado_actual === 'Activo') ? 'Rechazado' : 'Activo';

// Actualizar el estado en la base de datos
$sql_update = "UPDATE contratos SET estado = '$nuevo_estado' WHERE contratosid = $id";
$conexion->query($sql_update);

// Redirigir de vuelta a la lista de contratos
header("Location: contratos.php");
?>

</body>
</html>
