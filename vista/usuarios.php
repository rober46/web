<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<h4 class="text-center custom-title">LISTA DE USUARIOS</h4>
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
    include "../controlador/controlador_eliminar_usuario.php";

    $sql=$conexion->query("SELECT 
    `UsuarioID`, 
    `Nombre`, 
    `Apellido`, 
    `usuarios`, 
    `password` FROM `usuarios` WHERE 1");
    ?>
    <a href="registro_usuario.php" class="btn btn-primary btn-rounded md-3"><i class="fa-solid fa-plus"></i> &nbsp;REGISTRAR</a>
    <a href="imprimir_usuarios.php" class="btn btn-primary btn-rounded md-3 float-end" style="margin-top: 5px; display: inline-block;"> <i class="fa-solid fa-print"></i> Imprimir </a>

    <table class="table table-bordered table-hover col-12" id="example" style="table-layout: fixed; width: 100%; word-wrap: break-word;">
    <thead class="text-center">
        <tr>
            <th scope="col"style="width: 10px; text-align: center;">N°</th>
            <th scope="col"style="text-align: center;">NOMBRES</th>
            <th scope="col"style="text-align: center;">APELLIDOS</th>
            <th scope="col"style="text-align: center;">USUARIO</th>
            <th scope="col"style="text-align: center;">PASSWORD</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $contador = 1; // Inicializa el contador
        while ($datos = $sql->fetch_object()) { ?>
            <tr>
                <td><?= $contador++ ?></td> <!-- Incrementa el contador -->
                <td><?= $datos->Nombre ?></td>
                <td><?= $datos->Apellido ?></td>
                <td><?= $datos->usuarios ?></td>
                <td>
                <span id="passwordField<?= $datos->id ?>"><?= str_repeat('*', strlen($datos->password)) ?></span>
                <i class="fas fa-eye verPassword" onclick="togglePassword('<?= $datos->password ?>', 'passwordField<?= $datos->id ?>', this)" style="cursor: pointer; margin-left: 50px;"></i>
            </td>
            <td>
                    <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->ClienteID ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="clientes.php?id=<?=$datos->ClienteID?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
        <?php }
        ?>

  </tbody>
</table>
<script src="../vista/login/js/togglePassword.js"></script>
</div>
</div>

<?php require('./layout/footer.php'); ?>