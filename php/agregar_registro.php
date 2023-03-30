<?php
//Se incluye el archivo que contiene la funcion de verificar los datos
include 'funciones.php';

//Conexion con base de datos
$conexion = new mysqli('localhost', 'root', '', 'estudiantes');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Agregar datos</title>
</head>

<body>
    <a href="../index.php">
        <div class="btn volver">
            Volver
        </div>
    </a>
    <div name="agg-form" id="agg-form" method="post" class="container-form">
        <h1>Agregar datos</h1>
        <form name="agg-form" id="agg-form" action="<?php basename(__FILE__) ?>" method="post">
            <div class="section"><label class="label-form agg">Cédula:</label>
                <input type="text" name="agg-ci" class="input ci" value="<?php if (isset($_POST['agg-ci'])) echo $_POST['agg-ci'] ?>">
            </div>
            <div class="section">
                <label class="label-form agg">Nombre:</label>
                <input type="text" name="agg-nombre" class="input nombre" value="<?php if (isset($_POST['agg-nombre'])) echo $_POST['agg-nombre'] ?>">
            </div>
            <div class="section">
                <label class="label-form agg">Apellido:</label>
                <input type="text" name="agg-apellido" class="input apellido" value="<?php if (isset($_POST['agg-apellido'])) echo $_POST['agg-apellido'] ?>">
            </div>
            <div class="section">
                <label class="label-form agg">Ciudad:</label>
                <input type="text" name="agg-ciudad" class="input ciudad" value="<?php if (isset($_POST['agg-ciudad'])) echo $_POST['agg-ciudad'] ?>">
            </div>
            <div class="section">
                <label class="label-form agg">Correo:</label>
                <input type="text" name="agg-correo" class="input correo" value="<?php if (isset($_POST['agg-correo'])) echo $_POST['agg-correo'] ?>">
            </div>
            <div class="section">
                <label class="label-form agg">Carrera:</label>
                <input type="text" name="agg-carrera" class="input carrera" value="<?php if (isset($_POST['agg-carrera'])) echo $_POST['agg-carrera'] ?>">
            </div>
            <input class="btn subir" name="agg-subir" type="submit" value="Subir">
        </form>
    </div>

    <?php

    if (isset($_POST['agg-subir'])) {
        if ($conexion->connect_errno) {
            echo '<div class="msg-error">Ha ocurrido un error al conectar con la base de datos: ' . $conexion->connect_error . '</div>';
        } else {
            //Obtenemos variables
            //Se busca el ultimo id de los registros
            $maxId = $conexion->query("SELECT `id` FROM `informacion` ORDER BY `id` DESC LIMIT 1");
            $maxId = $maxId->fetch_object();
            $id = ($maxId->id) + 1 ?? null;
            $ci = $_POST['agg-ci'] ?? null;
            $nombre = $_POST['agg-nombre'] ?? null;
            $apellido = $_POST['agg-apellido'] ?? null;
            $ciudad = $_POST['agg-ciudad'] ?? null;
            $correo = $_POST['agg-correo'] ?? null;
            $carrera = $_POST['agg-carrera'] ?? null;

            //Se validan los datos
            $datos_valid = check_datos($ci, $nombre, $apellido, $ciudad, $correo, $carrera);

            if ($datos_valid) {
                $query_insert = "INSERT INTO `informacion`(`id`,`cedula`,`nombre`,`apellido`,`ciudad`,`correo`,`carrera`) VALUES ('$id','$ci','$nombre','$apellido','$ciudad','$correo','$carrera')";

                $conexion->query($query_insert);

                header("Location: ../index.php");
            }
        }
    }
    ?>
</body>

</html>