<?php $conexion = mysqli_connect('localhost', 'root', '', 'estudiantes'); mysqli_set_charset($conexion,'utf8')?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
</head>

<body>
    <h1>Base de datos: Estudiantes</h1>
    <div class="tabla">
        <table>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Cédula</td>
                <td>Ciudad</td>
                <td>Teléfono</td>
                <td>Correo</td>
                <td>Carrera</td>
            </tr>
        </table>
    </div>
</body>

</html>