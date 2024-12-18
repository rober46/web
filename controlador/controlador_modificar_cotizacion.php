<?php
if (!empty($_POST["btnmodificar"])) {
    // Verifica que todos los campos están completos y no vacíos
    if (
        isset($_POST["txtfecha"]) && !empty($_POST["txtfecha"]) &&
        isset($_POST["txtnombrecliente"]) && !empty($_POST["txtnombrecliente"]) &&
        isset($_POST["txtcotizacion"]) && !empty($_POST["txtcotizacion"]) &&
        isset($_POST["txtreferencia"]) && !empty($_POST["txtreferencia"]) &&
        isset($_POST["txtnota"]) && !empty($_POST["txtnnota"]) &&
        isset($_POST["txtid"]) && !empty($_POST["txtid"])
    ) {
        // Captura los datos del formulario
        $id = intval($_POST["txtid"]);
        $fecha = $_POST["txtfecha"];
        $nombrecliente = intval($_POST["txtnombrecliente"]);
        $cotizacion = intval($_POST["txtcotizacion"]);
        $referencia = $_POST["txtreferencia"];
        $nota = $_POST["txtnota"];

        // Ejecutar la consulta de actualización
        $sql = $conexion->query("
            UPDATE cotizaciones 
            SET 
            fecha ='$fecha',
            nombrecliente ='$nombrecliente',
            cotizacion ='$cotizacion',
            referencia ='$referencia',
            nota='$nota'
            WHERE cotizacionesid = '$id'
        ");

        if ($sql) { ?>
            <script>
                $(function notificacion() {
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "La cotizacion se ha modificado correctamente",
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
                        text: "Error al modificar cotizacion",
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
