<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "representaciones_guess_eirl");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Consultar los datos
$sql = "SELECT * FROM clientes";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 1.5em; /* Reducir tamaño del título */
            margin-bottom: 20px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px; /* Reducir el padding del contenedor */
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 0.8em; /* Reducir tamaño de la fuente en la tabla */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px 10px; /* Reducir el padding de las celdas */
            text-align: left;
            color: #555;
        }

        th {
            background-color: #4CAF50;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 1px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .btn {
            padding: 8px 15px; /* Reducir padding del botón */
            margin-top: 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            font-size: 0.9em; /* Reducir el tamaño del texto del botón */
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Reporte de Clientes</h1>

    <div style="overflow-x:auto;">
        <table id="tablaClientes">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razón Social</th>
                    <th>RUC</th>
                    <th>Teléfono Empresa</th>
                    <th>Contacto</th>
                    <th>Cargo</th>
                    <th>Correo</th>
                    <th>Numero Celular</th>
                    <th>Dirección</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $contador = 1; // Inicializa el contador
                    while ($row = $resultado->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $contador++; ?></td> <!-- Muestra el contador y luego lo incrementa -->
                    <td><?php echo $row['razónsocial']; ?></td>
                    <td><?php echo $row['ruc']; ?></td>
                    <td><?php echo $row['teléfonoempresa']; ?></td>
                    <td><?php echo $row['contacto']; ?></td>
                    <td><?php echo $row['cargo']; ?></td>
                    <td><?php echo $row['Correo']; ?></td>
                    <td><?php echo $row['numerocelular']; ?></td>
                    <td><?php echo $row['Direccion']; ?></td>
                    <td><?php echo $row['FechaRegistro']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="action-buttons">
        <a href="clientes.php" class="btn">Atrás</a>
        <button onclick="imprimirReporte()" class="btn">Imprimir Reporte</button>
    </div>
</div>

<script>
    function imprimirReporte() {
        // Crear una ventana nueva para el reporte
        var ventana = window.open('', '_blank');
        var contenido = document.getElementById('tablaClientes').outerHTML;
        ventana.document.write(`
            <html>
            <head>
                <title>Reporte de Clientes</title>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                    }
                    th, td {
                        border: 1px solid black;
                        padding: 6px 10px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <h1>Reporte de Clientes</h1>
                ${contenido}
            </body>
            </html>
        `);
        ventana.document.close();
        ventana.print();
    }
</script>

</body>
</html>
