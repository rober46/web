<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtrazonsocial"]) and !empty($_POST["txtruc"]) and !empty($_POST["txttelefonoempresa"]) and !empty($_POST["txtcontacto"]) and !empty($_POST["txtcargo"]) and !empty($_POST["txtcorreo"]) and !empty($_POST["txtnumerocelular"]) and !empty($_POST["txtdireccion"]) and !empty($_POST["txtfecharegistro"])) {
        $razonsocial = $_POST["txtrazonsocial"];
        $ruc = $_POST["txtruc"];
        $telefonoempresa = $_POST["txttelefonoempresa"];
        $contacto = $_POST["txtcontacto"];
        $cargo = $_POST["txtcargo"];
        $correo = $_POST["txtcorreo"];
        $numerocelular = $_POST["txtnumerocelular"];
        $Direccion = $_POST["txtdireccion"];
        $FechaRegistro = $_POST["txtfecharegistro"];

        $registro = $conexion->query(" insert into proveedores( razonsocial,ruc,telefonoempresa,contacto,cargo,correo,numerocelular,Direccion,FechaRegistro)values('$razonsocial','$ruc','$telefonoempresa','$contacto','$cargo','$correo','$numerocelular','$Direccion','$FechaRegistro')");
        if ($registro == true) {?>
       <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "El proveedor se ha registrado correctamente",
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
                    text: "Error al aregistrar proveedor",
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