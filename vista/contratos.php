<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<div class="page-content">

<head>
    <!-- Agregar SweetAlert2 desde un CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<h4 class="text-center custom-title">LISTA DE ORDENES DE COMPRAS</h4>
<style>
    .custom-title {
        font-family: 'Georgia', serif;
        font-size: 30px;
        color: #333;
        background-color: #f8f9fa;
        padding: 10px 50px;
        border: 2px solid #007bff;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-transform: uppercase;
        letter-spacing: 1px;
    }
</style>

<?php
    include "../modelo/conexion.php";
    include "../controlador/controlador_eliminar_contrato.php";
    include "../controlador/controlador_modificar_contrato.php";

    $sql = $conexion->query("SELECT 
    `contratosid`, 
    `fecha`, 
    `proveedor`, 
    `cliente`, 
    `descripcion`, 
    `importe` FROM `contratos` WHERE 1");
?>

<a href="registro_contratos.php" class="btn btn-primary btn-rounded md-3"><i class="fa-solid fa-plus"></i> &nbsp;REGISTRAR</a>
<a href="imprimir_contratos.php" class="btn btn-primary btn-rounded md-3 float-end" style="margin-top: 5px; display: inline-block;"> <i class="fa-solid fa-print"></i> Imprimir </a>

<table class="table table-bordered table-hover col-12" id="example" style="table-layout: fixed; width: 100%; word-wrap: break-word;">
    <thead class="text-center">
        <tr>
            <th scope="col"style="width: 50px; text-align: center;">N°</th>
            <th scope="col"style="text-align: center;">FECHA</th>
            <th scope="col"style="text-align: center;">PROVEEDOR</th>
            <th scope="col"style="text-align: center;">CLIENTE</th>
            <th scope="col"style="text-align: center;">DESCRIPCION</th>
            <th scope="col"style="text-align: center;">IMPORTE</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $contador = 1; 
        while ($datos = $sql->fetch_object()) { ?>
            <tr id="contrato<?= $datos->contratosid ?>">
                <td><?= $contador++ ?></td>
                <td><?= $datos->fecha ?></td>
                <td><?= $datos->proveedor ?></td>
                <td><?= $datos->cliente ?></td>
                <td><?= $datos->descripcion ?></td>
                <td><?= $datos->importe ?></td>
                </td>
                <td>
                <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->contratosid ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="contratos.php?id=<?=$datos->contratosid?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <a href="#" class="btn btn-primary btn-sm btn-rounded" onclick="mostrarEstado(<?= $datos->contratosid ?>)"><i class="btn btn-primary btn-rounded md-3" style="margin-top: 5px; display: inline-block; padding: 5px 1px; font-size: 12px;"></i> ESTADO
                    </a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

<script>
    function mostrarEstado(contratoId) {
        Swal.fire({
            title: '¿Qué estado tiene el contrato?',
            text: "Elige una opción:",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Activo',
            cancelButtonText: 'Rechazado',
        }).then((result) => {
            // Si se elige "Activo"
            if (result.isConfirmed) {
                // Cambiar el color de la fila correspondiente a verde
                document.getElementById('contrato' + contratoId).style.backgroundColor = 'green';
                document.getElementById('estado' + contratoId).innerText = 'Activo';
                Swal.fire({
                    icon: 'success',
                    title: 'Contrato Aprobado',
                    text: 'El contrato está activo.',
                });
                // Aquí puedes agregar código para actualizar el estado en la base de datos
            }
            // Si se elige "Rechazado"
            else if (result.dismiss === Swal.DismissReason.cancel) {
                // Cambiar el color de la fila correspondiente a rojo
                document.getElementById('contrato' + contratoId).style.backgroundColor = 'red';
                document.getElementById('estado' + contratoId).innerText = 'Rechazado';
                Swal.fire({
                    icon: 'error',
                    title: 'Contrato Rechazado',
                    text: 'El contrato ha sido rechazado.',
                });
                // Aquí puedes agregar código para actualizar el estado en la base de datos
            }
        });
    }
</script>


</a>

</td>
</tr>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->contratosid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-betweer">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modificar orden de compras</h5>
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
    
  </tbody>
  </table>

</div>
</div>
