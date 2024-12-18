<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<?php



?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<h4 class="text-center text-secondery">REGISTRO DE USUARIO</h4>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_usuario.php"
?>

<div class="row">
  <form action="" method="POST">
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <input type="text" placeholder="Nombre" class="input input__text" name="txtnombre">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <input type="text" placeholder="Apellido" class="input input__text" name="txtapellido">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <input type="text" placeholder="Usuario" class="input input__text" name="txtusuario">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
      <input type="password" placeholder="password" class="input input__text" name="txtpassword">
    </div>
    <div class="text-right p-2">
      <a href="usuarios.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>

</div>
</div>

<?php require('./layout/footer.php'); ?>