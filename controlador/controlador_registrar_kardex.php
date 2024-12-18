
<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtfecha"]) and !empty($_POST["txtdetalle"]) and !empty($_POST["txtcantidad"]) and !empty($_POST["txtpreciounitario"]) and !empty($_POST["txtpreciototal"]) and !empty($_POST["txtcantidadsalida"]) and !empty($_POST["txtpreciounitariosalida"]) and !empty($_POST["txtpreciototalsalida"]) and !empty($_POST["txtcantidadsaldo"]) and !empty($_POST["txtpreciounitariosaldo"]) and !empty($_POST["txttotalsaldo"])) {
        $fecha = $_POST["txtfecha"];
        $detalle = $_POST["txtdetalle"];
        $cantidad = $_POST["txtcantidad"];
        $preciounitario = $_POST["txtpreciounitario"];
        $preciototal = $_POST["txtpreciototal"];
        $cantidadsalida = $_POST["txtcantidadsalida"];
        $preciounitariosalida = $_POST["txtpreciounitariosalida"];
        $preciototalsalida = $_POST["txtpreciototalsalida"];
        $cantidadsaldo = $_POST["txtcantidadsaldo"];
        $preciounitariosaldo = $_POST["txtpreciounitariosaldo"];
        $totalsaldo = $_POST["txttotalsaldo"];

        $registro = $conexion->query(" insert into kardek( fecha,detalle,cantidad,preciounitario,preciototal,cantidadsalida,preciounitariosalida,preciototalsalida,cantidadsaldo,preciounitariosaldo,totalsaldo)values('$fecha','$detalle','$preciounitario','$preciototal','$cantidadsalida','$preciounitariosalida','$preciototalsalida','$cantidadsaldo','$preciounitariosaldo','$totalsaldo')");
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
