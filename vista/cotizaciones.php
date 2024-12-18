
<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<?php
// session_start();
// if (empty($_SESSION['user']) and empty($_SESSION['clave'])) {
//     header('location:login/login.php');
// }

?>

<div class="page-content">

<h4 class="text-center custom-title">LISTA DE COTIZACIONES</h4>
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
    include "../controlador/controlador_modificar_cotizacion.php";

    $sql = $conexion->query("SELECT 
    `cotizacionid`, 
    `fecha`, 
    `nombrecliente`, 
    `cotizacion`, 
    `referencia`, 
    `nota` FROM `cotizaciones` WHERE 1");
?>

<a href="registro_contratos.php" class="btn btn-primary btn-rounded md-3"><i class="fa-solid fa-plus"></i> &nbsp;REGISTRAR</a>
<a href="imprimir_contratos.php" class="btn btn-primary btn-rounded md-3 float-end" style="margin-top: 5px; display: inline-block;"> <i class="fa-solid fa-print"></i> Imprimir </a>

<table class="table table-bordered table-hover col-12" id="example" style="table-layout: fixed; width: 100%; word-wrap: break-word;">
    <thead class="text-center">
        <tr>
            <th scope="col"style="width: 50px; text-align: center;">N°</th>
            <th scope="col"style="text-align: center;">FECHA</th>
            <th scope="col"style="text-align: center;">NOMBRE CLIENTE</th>
            <th scope="col"style="text-align: center;">COTIZACION</th>
            <th scope="col"style="text-align: center;">REFERENCIA</th>
            <th scope="col"style="text-align: center;">NOTA</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php
        $contador = 1; 
        while ($datos = $sql->fetch_object()) { ?>
            <tr id="cotizacion<?= $datos->cotizacionid ?>">
                <td><?= $contador++ ?></td>
                <td><?= $datos->fecha ?></td>
                <td><?= $datos->nombrecliente ?></td>
                <td><?= $datos->cotizacion ?></td>
                <td><?= $datos->referencia ?></td>
                <td><?= $datos->nota ?></td>
                </td>
                <td>
                <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->cotizacionid ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="cotizaciones.php?id=<?=$datos->cotizacionid?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    <a href="#" class="btn btn-primary btn-sm btn-rounded" onclick="mostrarEstado(<?= $datos->cotizacionid ?>)"><i class="btn btn-primary btn-rounded md-3" style="margin-top: 5px; display: inline-block; padding: 5px 1px; font-size: 12px;"></i> ESTADO </a>
                </td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

<script>
    function mostrarEstado(cotizacionId) {
        Swal.fire({
            title: '¿Qué estado tiene la cotizacion?',
            text: "Elige una opción:",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Activo',
            cancelButtonText: 'Rechazado',
        }).then((result) => {
            // Si se elige "Activo"
            if (result.isConfirmed) {
                // Cambiar el color de la fila correspondiente a verde
                document.getElementById('cotizacion' + cotizacionId).style.backgroundColor = 'green';
                document.getElementById('estado' + cotizacionId).innerText = 'Activo';
                Swal.fire({
                    icon: 'success',
                    title: 'Cotizacion Aprobado',
                    text: 'La cotizacion está activo.',
                });
                // Aquí puedes agregar código para actualizar el estado en la base de datos
            }
            // Si se elige "Rechazado"
            else if (result.dismiss === Swal.DismissReason.cancel) {
                // Cambiar el color de la fila correspondiente a rojo
                document.getElementById('cotizacion' + cotizacionId).style.backgroundColor = 'red';
                document.getElementById('estado' + cotizacionId).innerText = 'Rechazado';
                Swal.fire({
                    icon: 'error',
                    title: 'Cotizacion Rechazado',
                    text: 'La cotizacion ha sido rechazado.',
                });
                // Aquí puedes agregar código para actualizar el estado en la base de datos
            }
        });
    }
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $datos->cotizacionid ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header d-flex justify-content-betweer">
        <h5 class="modal-title w-100" id="exampleModalLabel">Modificar cotizacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
      <form action="" method="POST">
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtfecha">Fecha</label>
        <input type="text" placeholder="fecha" class="input input__text" id="txtfecha" name="txtfecha" value="<?= $datos->fecha ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtnombrecliente">Nombre Cliente</label>
        <input type="text" placeholder="nombrecliente" class="input input__text" id="txtnombrecliente" name="txtnombrecliente" value="<?= $datos->nombrecliente ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtcotizacion">Cotizacion</label>
        <input type="text" placeholder="cotizacion" class="input input__text" id="txtcotizacion" name="txtcotizacion" value="<?= $datos->cotizacion ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtreferencia">Referencia</label>
        <input type="text" placeholder="referencia" class="input input__text" id="txtreferencua" name="txtreferecnia" value="<?= $datos->referencia ?>">
    </div>
    <div class="fl-flex-label mb-4 px-2 col-12">
        <label for="txtnota">Nota</label>
        <input type="text" placeholder="nota" class="input input__text" id="txtnota" name="txtnota" value="<?= $datos->nota ?>">
        </div>
    <div class="text-right p-2">
        <a href="cotizaciones.php" class="btn btn-secondary btn-rounded">ATRÁS</a>
        <button type="submit" value="ok" name="btnmodificar" class="btn btn-primary btn-rounded">Modificar</button>
    </div>
    </div>
    </form>
    </div>
    </div>
  </div>
</div>

</div>
</div>



<?php require('./layout/footer.php'); ?>