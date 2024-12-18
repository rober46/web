<?php
if (!empty($_POST["btnmodificar"])) {
    // Verifica que todos los campos están completos y no vacíos
    if (
        isset($_POST["txtrazónsocial"]) && !empty($_POST["txtrazónsocial"]) &&
        isset($_POST["txtruc"]) && !empty($_POST["txtruc"]) &&
        isset($_POST["txtteléfonoempresa"]) && !empty($_POST["txtteléfonoempresa"]) &&
        isset($_POST["txtcontacto"]) && !empty($_POST["txtcontacto"]) &&
        isset($_POST["txtcargo"]) && !empty($_POST["txtcargo"]) &&
        isset($_POST["txtcorreo"]) && !empty($_POST["txtcorreo"]) &&
        isset($_POST["txtnumerocelular"]) && !empty($_POST["txtnumerocelular"]) &&
        isset($_POST["txtdireccion"]) && !empty($_POST["txtdireccion"]) &&
        isset($_POST["txtfecharegistro"]) && !empty($_POST["txtfecharegistro"]) &&
        isset($_POST["txtid"]) && !empty($_POST["txtid"])
    ) {
        // Captura los datos del formulario
        $id = intval($_POST["txtid"]);
        $razónsocial = $_POST["txtrazónsocial"];
        $ruc = intval($_POST["txtruc"]);
        $teléfonoempresa = intval($_POST["txtteléfonoempresa"]);
        $contacto = $_POST["txtcontacto"];
        $cargo = $_POST["txtcargo"];
        $Correo = $_POST["txtcorreo"];
        $numerocelular = intval($_POST["txtnumerocelular"]);
        $Direccion = $_POST["txtdireccion"];
        $FechaRegistro = $_POST["txtfecharegistro"];

        // Ejecutar la consulta de actualización
        $sql = $conexion->query("
            UPDATE Clientes 
            SET 
                razónsocial = '$razónsocial', 
                ruc = $ruc, 
                teléfonoempresa = $teléfonoempresa, 
                contacto = '$contacto', 
                cargo = '$cargo', 
                Correo = '$Correo', 
                numerocelular = $numerocelular, 
                Direccion = '$Direccion', 
                FechaRegistro = '$FechaRegistro' 
            WHERE ClienteID = $id
        ");

        if ($sql) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "El cliente se ha modificado correctamente",
                        styling: "bootstrap3"
                    });
                });
            </script>
        <?php } else { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "INCORRECTO",
                        type: "error",
                        text: "Error al modificar cliente",
                        styling: "bootstrap3"
                    });
                });
            </script>
            <?php echo "Error en la consulta SQL: " . $conexion->error; ?>
        <?php }
    } else { ?>
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "Todos los campos son obligatorios",
                    styling: "bootstrap3",
                });
            });
        </script>
    <?php }
}
?>
