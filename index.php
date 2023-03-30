<!DOCTYPE html>
<html lang="es">
<?php $conexion = new mysqli('localhost', 'root', '', 'estudiantes'); ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Estudiantes</title>
</head>

<body>
    <div class="container-titulo">
        <h1 class="titulo">Información</h1>
    </div>

    <?php
    //Conexion con la base de datos

    //Comprobar que no haya error de conexion
    if ($conexion->connect_errno) {
        echo '<div class="msg-error">No se ha podido conectar con la base de datos:' . $conexion->connect_error . '</div>';
    } else { ?>

        <div class="container-btns">
            <a href="php/agregar_registro.php">
                <div class="btn add">
                    Agregar +
                </div>
            </a>
            <a href="php/buscar_registro.php">
                <div class="btn srch">
                    Buscar
                </div>
            </a>
        </div>
        <div class="container-tabla">
            <table class="tabla" cellspacing="0">
                <thead class="encabezado__tabla">
                    <tr class="registro__encabezado">
                        <th class="encabezado__columna izq">CI</th>
                        <th class="encabezado__columna">Nombre</th>
                        <th class="encabezado__columna">Apellido</th>
                        <th class="encabezado__columna">Ciudad</th>
                        <th class="encabezado__columna">Correo</th>
                        <th class="encabezado__columna">Carrera</th>
                        <th class="encabezado__columna der">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_mostrar = $conexion->query("SELECT * FROM `informacion`");

                    while ($registro = $query_mostrar->fetch_object()) {
                        echo '<tr name="registro-' . $registro->id . '" class="registro">
                    <td class="dato__registro">' . $registro->cedula . '</td>
                    <td class="dato__registro">' . $registro->nombre . '</td>
                    <td class="dato__registro">' . $registro->apellido . '</td>
                    <td class="dato__registro">' . $registro->ciudad . '</td>
                    <td class="dato__registro">' . $registro->correo . '</td>
                    <td class="dato__registro">' . $registro->carrera . '</td>
                    <td class="dato__opciones">
                    <a class="btn-edit" href="php/editar_registro.php?id=' . $registro->id . '">✏️</a>
                    <a class="btn-borrar" href="php/eliminar_registro.php?id=' . $registro->id . '">⛔</a>
                    </td>
                    </tr>';
                    } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</body>

</html>