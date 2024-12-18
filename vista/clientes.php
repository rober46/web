<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<h4 class="text-center custom-title">LISTA DE CLIENTES</h4>

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
    include "../controlador/controlador_modificar_cliente.php";
    include "../controlador/controlador_eliminar_cliente.php";
    

    $sql=$conexion->query("SELECT
    `ClienteID`,
    `razónsocial`, 
    `ruc`, 
    `teléfonoempresa`, 
    `contacto`, 
    `cargo`, 
    `Correo`, 
    `numerocelular`, 
    `Direccion`, 
    `FechaRegistro` FROM `clientes` WHERE 1");
    ?>
    <a href="registro_clientes.php" class="btn btn-primary btn-rounded md-3"><i class="fa-solid fa-plus"></i> &nbsp;REGISTRAR</a>
    <a href="imprimir_clientes.php" class="btn btn-primary btn-rounded md-3 float-end" style="margin-top: 5px; display: inline-block;"> <i class="fa-solid fa-print"></i> Imprimir </a>

    <table class="table table-bordered table-hover col-12" id="example" style="table-layout: fixed; width: 100%; word-wrap: break-word;">
    <thead class="text-center">
        <tr>
            <th scope="col"style="width: 10px; text-align: center;">N°</th>
            <th scope="col"style="text-align: center; word-wrap: break-word; white-space: normal;">RAZON SOCIAL</th>
            <th scope="col"style="text-align: center;">RUC</th>
            <th scope="col"style="text-align: center; word-wrap: break-word; white-space: normal;">TELEFONO EMPRESA</th>
            <th scope="col"style="text-align: center;">CONTACTO</th>
            <th scope="col"style="text-align: center;">CARGO</th>
            <th scope="col"style="text-align: center;">CORREO</th>
            <th scope="col"style="text-align: center; word-wrap: break-word; white-space: normal;">NUMERO DE CELULAR</th>
            <th scope="col"style="text-align: center;">DIRECCION</th>
            <th scope="col"style="text-align: center; word-wrap: break-word; white-space: normal;">FECHA REGISTRO</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $contador = 1; // Inicializa el contador
        while ($datos = $sql->fetch_object()) { ?>
            <tr>
                <td><?= $contador++ ?></td> <!-- Incrementa el contador -->
                <td style="word-wrap: break-word; white-space: normal;"> <?= $datos->razónsocial ?></td>
                <td><?= $datos->ruc ?></td>
                <td><?= $datos->teléfonoempresa ?></td>
                <td><?= $datos->contacto ?></td>
                <td><?= $datos->cargo ?></td>
                <td><?= $datos->Correo ?></td>
                <td><?= $datos->numerocelular ?></td>
                <td><?= $datos->Direccion ?></td>
                <td><?= $datos->FechaRegistro ?></td>
                <td>
                    <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->ClienteID ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="clientes.php?id=<?=$datos->ClienteID?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->ClienteID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-betweer">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modificar Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <form action="" method="POST">
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtrazónsocial">Razón Social</label>
        <input type="text" placeholder="razón social" class="input input__text" id="txtrazónsocial" name="txtrazónsocial" value="<?= $datos->razónsocial ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtruc">RUC</label>
        <input type="text" placeholder="RUC" class="input input__text" id="txtruc" name="txtruc" value="<?= $datos->ruc ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtteléfonoempresa">Teléfono Empresa</label>
        <input type="text" placeholder="teléfono empresa" class="input input__text" id="txtteléfonoempresa" name="txtteléfonoempresa" value="<?= $datos->teléfonoempresa ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtcontacto">Contacto</label>
        <input type="text" placeholder="contacto" class="input input__text" id="txtcontacto" name="txtcontacto" value="<?= $datos->contacto ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtcargo">Cargo</label>
        <input type="text" placeholder="cargo" class="input input__text" id="txtcargo" name="txtcargo" value="<?= $datos->cargo ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtcorreo">Correo</label>
        <input type="text" placeholder="correo" class="input input__text" id="txtcorreo" name="txtcorreo" value="<?= $datos->Correo ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtnumerocelular">Número Celular</label>
        <input type="text" placeholder="número celular" class="input input__text" id="txtnumerocelular" name="txtnumerocelular" value="<?= $datos->numerocelular ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtdireccion">Dirección</label>
        <input type="text" placeholder="dirección" class="input input__text" id="txtdireccion" name="txtdireccion" value="<?= $datos->Direccion ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtfecharegistro">Fecha Registro</label>
        <input type="text" placeholder="fecha de registro" class="input input__text" id="txtfecharegistro" name="txtfecharegistro" value="<?= $datos->FechaRegistro ?>">
    </div>
    <div class="text-right p-2">
        <a href="clientes.php" class="btn btn-secondary btn-rounded">ATRÁS</a>
        <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
    </div>
    </form>
    </div>
    </div>
  </div>
</div>
        <?php }
        ?>

  </tbody>
</table>

</div>
</div>
<script>
    setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);
  </script>
<?php require('./layout/footer.php'); ?>