
<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<?php
// session_start();
// if (empty($_SESSION['user']) and empty($_SESSION['clave'])) {
//     header('location:login/login.php');
// }

?>

<div class="page-content">

<h4 class="text-center custom-title">LISTA KARDEX</h4>
<style>
    .custom-title {
        font-family: 'Georgia', serif; /* Elegante tipo de letra */
        font-size: 30px; /* Tamaño grande */
        color: #333; /* Color oscuro para el texto */
        background-color: #f8f9fa; /* Fondo claro para resaltar */
        padding: 10px 50px; /* Espaciado interno */
        border: 2px solid #007bff; /* Borde elegante de color azul */
        border-radius: 15px; /* Bordes redondeados */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        text-transform: uppercase; /* Transformar texto a mayúsculas */
        letter-spacing: 1px; /* Espaciado entre letras */
    }
</style>
<?php
    include "../modelo/conexion.php";

    $sql=$conexion->query("SELECT 
    `id`, 
    `articulo`, 
    `codigo`, 
    `cant_maxima`, 
    `cant_minima`, 
    `fecha`, 
    `detalle`, 
    `cantidad`, 
    `preciounitario`, 
    `preciototal`, 
    `cantidadsalida`, 
    `preciounitariosalida`, 
    `preciototalsalida`, 
    `cantidadsaldo`, 
    `preciounitariosaldo`,
    `totalsaldo` FROM `kardex` WHERE 1");
    ?>
    <a href="registro_kardex.php" class="btn btn-primary btn-rounded md-3"><i class="fa-solid fa-plus"></i> &nbsp;REGISTRAR</a>
    <a href="imprimir_clientes.php" class="btn btn-primary btn-rounded md-3 float-end" style="margin-top: 5px; display: inline-block;"> <i class="fa-solid fa-print"></i> Imprimir </a>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
        }
        .header-table {
            margin-bottom: 20px;
        }
        .header-table td {
            border: none;
            text-align: left;
        }
        .header-table th {
            background-color: #d9edf7;
            text-align: left;
        }
    </style>
</head>
<body>
    <table class="header-table">
        <tr>
            <th>ARTICULO</th>
            <td></td>
            <th>CANTIDAD MAXIMA</th>
            <td></td>
        </tr>
        <tr>
            <th>CODIGO</th>
            <td></td>
            <th>CANTIDAD MINIMA</th>
            <td></td>
        </tr>
    </table>

    <table>
    <table border="1">
    <thead>
        <tr>
            <th rowspan="2">#</th>
            <th rowspan="2">Fecha</th>
            <th rowspan="2">Detalle</th>
            <th colspan="3">Entradas</th>
            <th colspan="3">Salidas</th>
            <th colspan="3">Saldos</th>
        </tr>
        <tr>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Precio Total</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $contador = 1; // Inicializa el contador
        while ($datos = $sql->fetch_object()) { ?>
            <tr>
                <td><?= $contador++ ?></td> <!-- Incrementa el contador -->
                <td style="word-wrap: break-word; white-space: normal;"> <?= $datos->fecha ?></td>
                <td><?= $datos->detalle ?></td>
                <td><?= $datos->cantidad ?></td>
                <td><?= $datos->preciounitario ?></td>
                <td><?= $datos->preciototal ?></td>
                <td><?= $datos->cantidadsalida ?></td>
                <td><?= $datos->preciounitariosalida ?></td>
                <td><?= $datos->preciototalsalida ?></td>
                <td><?= $datos->cantidadsaldo ?></td>
                <td><?= $datos->preciounitariosaldo ?></td>
                <td><?= $datos->totalsaldo ?></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->ClienteID ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="clientes.php?id=<?=$datos->ClienteID?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php }
        ?>

</body>
</html>

<?php require('./layout/footer.php'); ?>