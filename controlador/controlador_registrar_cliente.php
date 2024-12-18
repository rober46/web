
<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtrazónsocial"]) and !empty($_POST["txtruc"]) and !empty($_POST["txtteléfonoempresa"]) and !empty($_POST["txtcontacto"]) and !empty($_POST["txtcargo"]) and !empty($_POST["txtcorreo"]) and !empty($_POST["txtnumerocelular"]) and !empty($_POST["txtdireccion"]) and !empty($_POST["txtfecharegistro"])) {
        $razónsocial = $_POST["txtrazónsocial"];
        $ruc = $_POST["txtruc"];
        $teléfonoempresa = $_POST["txtteléfonoempresa"];
        $contacto = $_POST["txtcontacto"];
        $cargo = $_POST["txtcargo"];
        $Correo = $_POST["txtcorreo"];
        $numerocelular = $_POST["txtnumerocelular"];
        $Direccion = $_POST["txtdireccion"];
        $FechaRegistro = $_POST["txtfecharegistro"];

        $registro = $conexion->query(" insert into clientes( razónsocial,ruc,teléfonoempresa,contacto,cargo,Correo,numerocelular,Direccion,FechaRegistro)values('$razónsocial','$ruc','$teléfonoempresa','$contacto','$cargo','$Correo','$numerocelular','$Direccion','$FechaRegistro')");
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
