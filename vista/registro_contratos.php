<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_contrato.php"
?>
<div class="row">
  <form action="" method="POST">
  <input type="hidden" name="txtid" value="<?php echo $contratosid; ?>"> <!-- ID del cliente -->
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="date" placeholder="" class="input input__text" name="txtfecha" required>
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="proveedor" class="input input__text" name="txtproveedor">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="cliente" class="input input__text" name="txtcliente">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="descripcion" class="input input__text" name="txtdescripcion">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="importe" class="input input__text" name="txtimporte">
      </div>
    <div class="text-right p-2">
      <a href="contratos.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>
  </form>

</div>


<?php require('./layout/footer.php'); ?>