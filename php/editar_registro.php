<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Editor</title>
</head>

<body>
    <a href="../index.php">
        <div class="btn volver">
            Volver
        </div>
    </a>
    <?php
    //Rescatar id de registro
    $id = $_GET['id'] ?? null;

    //Conexion con base de datos
    $conexion = new mysqli('localhost', 'root', '', 'estudiantes');

    //Incluir archivo con funcion
    include 'funciones.php';
    ?>

    <div class="container-form edit">
        <h1>Editar registro</h1>
        <form name="edit-form" id="edit-form" action="<?php basename(__FILE__) ?>" method="post">
            <?php
            if ($conexion->connect_errno) {
                echo '<div class="msg-error">Ha ocurrido un error al conectar con la base de datos: ' . $conexion->error . '</div>';
            } else {
                //Query de busqueda de registro
                $query_buscar = $conexion->query("SELECT * FROM `informacion` WHERE `id`='$id'");

                while ($registro = $query_buscar->fetch_object()) {
                    echo '<input type="hidden" name="edit-id" value="' . $registro->id . '" class="registro">
                        <div class="section"><label class="label-form edit">Cédula:</label><input name="edit-ci" class="input edit" value="' . $registro->cedula . '"></div><div class="section">
                        <label class="label-form edit">Nombre:</label><input name="edit-nombre"class="input edit" value="' . $registro->nombre . '"></div><div class="section">
                        <label class="label-form edit">Apellido:</label><input name="edit-apellido" class="input edit" value="' . $registro->apellido . '"></div><div class="section">
                        <label class="label-form edit">Ciudad:</label><input name="edit-ciudad" class="input edit" value="' . $registro->ciudad . '"></div><div class="section">
                        <label class="label-form edit">Teléfono:</label><input name="edit-tlfn" class="input edit" value="'.$registro->telefono.'"></div><div class="section">
                        <label class="label-form edit">Correo:</label><input name="edit-correo" class="input edit" value="' . $registro->correo . '"></div><div class="section">
                        <label class="label-form edit">Carrera:</label><input name="edit-carrera" class="input edit" value="' . $registro->carrera . '"></div>';
                }
            }
            ?>
            <input class="btn subir" name="edit-subir" type="submit" value="Subir">
        </form>
    </div>

    <?php
    if (isset($_POST['edit-subir'])) {
        if ($conexion->connect_errno) {
            echo '<div class="msg-error">Ha ocurrido un error al conectar con la base de datos: ' . $conexion->connect_error . '</div>';
        } else {
            //Obtenemos variables
            $ci = $_POST['edit-ci'] ?? null;
            $nombre = $_POST['edit-nombre'] ?? null;
            $apellido = $_POST['edit-apellido'] ?? null;
            $ciudad = $_POST['edit-ciudad'] ?? null;
            $telefono = $_POST['edit-tlfn'] ?? null;
            $correo = $_POST['edit-correo'] ?? null;
            $carrera = $_POST['edit-carrera'] ?? null;

            //Comprobar los datos
            $datos_valid = check_datos($ci, $nombre, $apellido, $ciudad, $telefono, $correo, $carrera);

            if ($datos_valid) {
                $query = "UPDATE `informacion` SET `cedula`='$ci', `nombre`='$nombre', `apellido`='$apellido', `ciudad`='$ciudad', `telefono`='$telefono', `correo`='$correo', `carrera`='$carrera' WHERE `id`='$id'";

                $conexion->query($query);

                $conexion->close();
                header("Location: ../index.php");
            }
        }
    }
    ?>
</body>

</html>