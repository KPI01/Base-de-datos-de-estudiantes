<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Búsqueda</title>
</head>

<body>
    <a href="../index.php">
        <div class="btn volver">
            Volver
        </div>
    </a>
    <h1 class="titulo">Buscar</h1>
    <div class="container-form">
        <form name="buscar-form" id="form-buscar" action="<?php basename(__FILE__) ?>" method="post">
            <select name="seleccion-key" id="seleccion-key" class="selection-key">
                <option value="null" selected disabled>Escoge una opcion</option>
                <option value="cedula" class="opcion-key">Cédula</option>
                <option value="nombre" class="opcion-key">Nombre</option>
                <option value="apellido" class="opcion-key">Apellido</option>
                <option value="ciudad" class="opcion-key">Ciudad</option>
                <option value="telefono" class="opcion-key">Teléfono</option>
                <option value="correo" class="opcion-key">Correo</option>
                <option value="carrera" class="opcion-key">Carrera</option>
            </select>
            <input type="text" name="valor-buscar" id="valor-buscar" class="input valor">
            <input class="btn buscar" name="buscar" id="buscar" type="submit" value="Buscar">
        </form>
    </div>

    <?php
    $keyBuscar = $_POST['seleccion-key'] ?? null;
    $valorBuscar = $_POST['valor-buscar'] ?? null;

    include 'funciones.php';

    $valor_valid = check_dato($keyBuscar, $valorBuscar);

    if (isset($_POST['buscar'])) {

        if ($valor_valid) {

            $conexion = new mysqli('localhost', 'root', '', 'estudiantes');

            $query = "SELECT * FROM `informacion` WHERE `$keyBuscar`='$valorBuscar'";

            if ($conexion->connect_errno) {
                echo '<div class="msg-error">No se ha podido conectar con la base de datos:' . $conexion->connect_error . '</div>';
            } else {
                $resultado = $conexion->query($query);

                echo '<table class="tabla" cellspacing="0">
                <thead class="encabezado__tabla">
                <tr class="registro__encabezado">';
                echo '<th class="encabezado__columna izq">CI</th>
                    <th class="encabezado__columna">Nombre</th>
                    <th class="encabezado__columna">Apellido</th>
                    <th class="encabezado__columna">Ciudad</th>
                    <th class="encabezado__columna">Teléfono</th>
                    <th class="encabezado__columna">Correo</th>
                    <th class="encabezado__columna">Carrera</th>
                    <th class="encabezado__columna der">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>';
                if ($registro = $resultado->num_rows == 0) {
                    echo '<div class="msg-error">No se han encontrado registros con ' . $keyBuscar . ' = ' . $valorBuscar . '</div>';
                } else {
                    while ($registro = $resultado->fetch_object()) {
                        echo '';
                        echo '<tr name="registro-' . $registro->id . '" class="registro">
                    <td class="dato__registro">' . $registro->cedula . '</td>
                    <td class="dato__registro">' . $registro->nombre . '</td>
                    <td class="dato__registro">' . $registro->apellido . '</td>
                    <td class="dato__registro">' . $registro->ciudad . '</td>
                    <td class="dato__registro">' . $registro->telefono . '</td>
                    <td class="dato__registro">' . $registro->correo . '</td>
                    <td class="dato__registro">' . $registro->carrera . '</td>
                    <td class="dato__opciones">
                    <a class="btn-edit" href="editar_registro.php?id=' . $registro->id . '">✏️</a>
                    <a class="btn-borrar" href="eliminar_registro.php?id=' . $registro->id . '">⛔</a>
                    </td>
                    </tr>';
                    }
                }
                echo '</tbody>
                    </table>';
            }
        }
    }
    ?>
</body>

</html>