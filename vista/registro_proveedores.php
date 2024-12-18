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

<h4 class="text-center text-secondery">REGISTRO DE PROVEEDORES</h4>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_proveedores.php";
?>

<div class="row">
<form action="" method="POST">
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Razon Social" class="input input__text" name="txtrazonsocial">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Ruc" class="input input__text" name="txtruc">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Telefono Empresa" class="input input__text" name="txttelefonoempresa">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Contacto" class="input input__text" name="txtcontacto">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Cargo" class="input input__text" name="txtcargo">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Correo" class="input input__text" name="txtcorreo">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Numero Celular" class="input input__text" name="txtnumerocelular">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Direccion" class="input input__text" name="txtdireccion">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Fecha Registro" class="input input__text" name="txtfecharegistro">
      </div>
    <div class="text-right p-2">
      <a href="proveedores.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>
  </form>

</div>
</div>

<?php require('./layout/footer.php'); ?>