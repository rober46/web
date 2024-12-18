<?php
if (!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql = $conexion->query(" delete from proveedores where ProveedorID=$id ");
    if ($sql == true) { ?>
        <script>
            $(function notification(){
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "Proveedor eliminada correctamente",
                    styling: "bootstrap3",
                })
            })
        </script>
        <?php } else { ?>
        <script>
            $(function notification(){
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "Error al eliminar",
                    styling: "bootstrap3",
                })
            })
        </script>
<?php } ?>
  
  <script>
    setTimeout(() => {
        window.history.replaceState(null, null, window.location.pathname);
    }, 0);
  </script>

<?php }
