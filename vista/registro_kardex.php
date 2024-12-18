<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<h4 class="text-center text-secondery">REGISTRO DE KARDEX</h4>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_kardex.php"
?>
<div class="row">
  <form action="" method="POST">
  <input type="hidden" name="txtid" value="<?php echo $clienteID; ?>"> <!-- ID del cliente -->
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Fecha" class="input input__text" name="txtfecha">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Detalle" class="input input__text" name="txtdetalle">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Cantidad" class="input input__text" name="txtcantidad">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Preciounitario" class="input input__text" name="txtpreciounitario">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Preciototal" class="input input__text" name="txtpreciototal">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Cantidad Salidad" class="input input__text" name="txtcantidadsalida">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Precio Unitario Salida" class="input input__text" name="txtpreciounitariosalida">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Precio Total Salida" class="input input__text" name="txtpreciototalsalida">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Cantidad Saldo" class="input input__text" name="txtcantidadsaldo">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Precio Unitario Saldo" class="input input__text" name="txtpreciounitariosaldo">
      </div>
      <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Total Saldo" class="input input__text" name="txttotalsalto">
      </div>
    <div class="text-right p-2">
      <a href="kardex.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>
  </form>

</div>
</div>

<?php require('./layout/footer.php'); ?>