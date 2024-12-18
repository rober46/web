<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<?php
// session_start();
// if (empty($_SESSION['user']) and empty($_SESSION['clave'])) {
//     header('location:login/login.php');
// }

?>

<?php
include "../controlador/actualizar.php";
?>

<div class="page-content">

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de la Empresa</title>
    <!-- Estilos -->
    <style>
        /* Estilo General */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }

        h2 {
            font-size: 1.4em;
            font-weight: normal;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .form-column {
            flex: 1;
            margin-right: 15px;
        }

        .form-column:last-child {
            margin-right: 0;
        }

        .input-container {
            position: relative;
        }

        .input-container input {
            width: 100%;
            padding: 8px 10px 8px 30px;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
            font-size: 0.9em;
            transition: border-color 0.3s;
        }

        .input-container input:focus {
            border-bottom: 2px solid #1e88e5;
        }

        .input-container i {
            position: absolute;
            left: 5px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
        }

        button {
            background-color: #009688;
            color: #fff;
            font-weight: bold;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #00796b;
        }

        hr {
            margin: 30px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }
    </style>
    <!-- Iconos de FontAwesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- Sección Información de la empresa -->
        <h2>Información de la empresa</h2>
        <form action="procesar_configuracion.php" method="POST">
            <!-- Primera fila: Nombre y Teléfono -->
            <div class="form-row">
                <!-- Nombre de la empresa -->
                <div class="form-column">
                    <label for="nombre_empresa">Nombre de la empresa</label>
                    <div class="input-container">
                        <i class="fas fa-building"></i>
                        <input type="text" id="nombre_empresa" name="nombre_empresa" value="Representaciones Guess EIRL">
                    </div>
                </div>

                <!-- Teléfono de la empresa -->
                <div class="form-column">
                    <label for="telefono_empresa">Teléfono de la empresa</label>
                    <div class="input-container">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="telefono_empresa" name="telefono_empresa" value="9611702915">
                    </div>
                </div>
            </div>

            <!-- Segunda fila: Dirección -->
            <label for="direccion_empresa">Dirección de la empresa</label>
            <div class="input-container">
                <i class="fas fa-map-marker-alt"></i>
                <input type="text" id="direccion_empresa" name="direccion_empresa" value="Calle av. junin #.205, Piura, Ciudad de Peru, Código Postal 20001">
            </div>

            <hr> <!-- Separador -->

            <!-- Sección Datos del Trabajador -->
            <h2>Información de Trabajador</h2>
            <div class="form-row">
                <!-- Nombre del trabajador -->
                <div class="form-column">
                    <label for="nombre_trabajador">Nombre del trabajador</label>
                    <div class="input-container">
                        <i class="fas fa-user"></i>
                        <input type="text" id="nombre_trabajador" name="nombre_trabajador" placeholder="JORGE">
                    </div>
                </div>

                <!-- Teléfono del trabajador -->
                <div class="form-column">
                    <label for="telefono_trabajador">Teléfono del trabajador</label>
                    <div class="input-container">
                        <i class="fas fa-phone"></i>
                        <input type="tel" id="telefono_trabajador" name="telefono_trabajador" placeholder="987456321">
                    </div>
                </div>
            </div>

            <!-- Cargo del trabajador -->
            <label for="cargo_trabajador">Cargo del trabajador</label>
            <div class="input-container">
                <i class="fas fa-briefcase"></i>
                <input type="text" id="cargo_trabajador" name="cargo_trabajador" placeholder="Soporte tecnico">
            </div>

            <hr> <!-- Separador -->

            <!-- Sección Datos de la Jefa -->
            <h2>Información de la Jefa</h2>
            <label for="nombre_jefa">Nombre de la jefa</label>
            <div class="input-container">
                <i class="fas fa-user-tie"></i>
                <input type="text" id="nombre_jefa" name="nombre_jefa" value="Carmen María Soledad Morey Campos">
            </div>

            <label for="telefono_jefa">Teléfono de la jefa</label>
            <div class="input-container">
                <i class="fas fa-phone"></i>
                <input type="tel" id="telefono_jefa" name="telefono_jefa" placeholder="968532147">
            </div>

            <!-- Botón de envío -->
            <button type="submit">Actualizar</button>
        </form>
    </div>
</body>
</html>






<?php require('./layout/footer.php'); ?>