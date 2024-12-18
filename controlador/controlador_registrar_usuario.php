<?php

require_once "../modelo/conexion.php";

if (!empty($_POST["btnregistrar"])) {
   if (!empty($_POST["txtnombre"]) and !empty($_POST["txtapellido"]) and !empty($_POST["txtusuarios"]) and !empty($_POST["txtpassword"])) {
       $Nombre = $_POST["txtnombre"];
       $Apellido = $_POST["txtapellio"];
       $usuarios = $_POST["txtusuarios"];
       $password=$_POST["txtpassword"];
       
    
       $registro=$conexion->query(" insert into usuarios(Nombre,Apellido,usuarios,password)values('$Nombre','$Apellido','$usuarios','$password') ");
       if ($registro==true) {?>
       <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "SUCCESS",
                    text: "El usuario se ha registrado correctamente",
                    styling: "bootstrap3"
                })
            })
        </script>
       <?php } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "Error al aregistrar usuario",
                    styling: "bootstrap3",
                })
            })
        </script>
<?php 
} 
} else { ?>
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
