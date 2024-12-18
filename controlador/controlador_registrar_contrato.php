
<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtfecha"]) and !empty($_POST["txtproveedor"]) and !empty($_POST["txtcliente"]) and !empty($_POST["txtdescripcion"]) and !empty($_POST["txtimporte"])) {
        $fecha = $_POST["txtfecha"];
        $proveedor = $_POST["txtproveedor"];
        $cliente = $_POST["txtcliente"];
        $descripcion = $_POST["txtdescripcion"];
        $importe = $_POST["txtimporte"];

        $registro = $conexion->query(" insert into contratos( fecha,proveedor,cliente,descripcion,importe)values('$fecha','$proveedor','$cliente','$descripcion','$importe')");
        if ($registro == true) {?>
       <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "El cliente se ha registrado correctamente",
                    styling: "bootstrap3"
                })
            })
        </script>
       <?php } else {?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "Error al aregistrar cliente",
                    styling: "bootstrap3",
                })
            })
        </script>
<?php }
    } else {?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "Los campos estan vacios",
                    styling: "bootstrap3",
                })
            })
        </script>
<script>
    setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);
  </script>

<?php
}
}
