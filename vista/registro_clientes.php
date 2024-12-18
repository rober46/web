<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<h4 class="text-center text-secondery">REGISTRO DE CLIENTES</h4>

<?php
include "../modelo/conexion.php";
include "../controlador/controlador_registrar_cliente.php"
?>

<div class="row">
  <form action="" method="POST">
  <input type="hidden" name="txtid" value="<?php echo $clienteID; ?>"> <!-- ID del cliente -->
  <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Razón Social" class="input input__text" name="txtrazónsocial">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Ruc" class="input input__text" name="txtruc">
       </div>
       <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
         <input type="text" placeholder="Teléfono Empresa" class="input input__text" name="txtteléfonoempresa">
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
      <a href="clientes.php" class="btn btn-secondary btn-rounded">ATRAS</a>
      <button type="submit" value="ok" name="btnregistrar" class="btn btn-primary btn-rounded">REGISTRAR</button>
    </div>
  </form>

</div>
</div>
</div>

<?php require('./layout/footer.php'); ?>