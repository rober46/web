<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtfecha"]) and !empty($_POST["txtnombrecliente"]) and !empty($_POST["txtcotizacion"]) and !empty($_POST["txtreferencia"]) and !empty($_POST["txtnota"])) {
        $fecha = $_POST["txtfecha"];
        $nombrecliente = $_POST["txtnombrecliente"];
        $cotizacion = $_POST["txtcotizacion"];
        $referencia = $_POST["txtreferencia"];
        $nota = $_POST["txtnota"];

        $registro = $conexion->query(" insert into cotizaciones( fecha,nombrecliente,cotizacion,referencia,nota)values('$fecha','$nombrecliente','$cotizacion','$referencia','$nota')");
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
