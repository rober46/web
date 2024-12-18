<?php require './layout/topbar.php';?>
<?php require './layout/sidebar.php';?>


<div class="page-content">

<h4 class="text-center text-secondery"></h4>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cotizaciones</title>
    <link rel="stylesheet" href="../public/css/app.css"> <!-- Enlace a tu CSS -->
</head>
<body>
<?php include "../controlador/chatbot.php";?>
    <h1>Agente Conversacional</h1>

    <iframe id="iframe_ia" width="100%" height="600px" src="<?=$data_url?>"></iframe>

</body>
</html>

</div>
</div>

<?php require './layout/footer.php';?>