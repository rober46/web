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

<h1 class="text-center text-secondery">FORMULARIO DE REGISTRO DE COTIZACIONES</h1>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_cotizacion.php"
?>
<div class="row">
  <form action="" method="POST">
  <input type="hidden" name="txtid" value="<?php echo $cotizacionid; ?>"> <!-- ID del cliente -->
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="date" placeholder="" class="input input__text" name="txtfecha" required>
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="nombrecliente" class="input input__text" name="txtnombrecliente">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="cotizacion" class="input input__text" name="txtcotizacion">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="referencia" class="input input__text" name="txtreferencia">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="nota" class="input input__text" name="txtnota">
      </div>
    <div class="text-right p-2">
      <a href="cotizaciones.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>
  </form>

</div>
<?php require('./layout/footer.php'); ?>