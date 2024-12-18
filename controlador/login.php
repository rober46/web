<?php

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["usuarios"]) and !empty($_POST["password"])) {
        $usuarios=$_POST["usuarios"];
        $password=$_POST["password"];
        $sql=$conexion->query(" select * from usuarios where usuarios='$usuarios' and password='$password' ");
        if ($sql->fetch_object()) {
            header("location:../clientes.php");
        } else {
            echo "<div class='alert alert-danger'>El usuarios no existe</div>";
        } 
    } else {
        echo "<div class='alert alert-danger'>Los campos estan vacíos</div>";
    }
}
?>
