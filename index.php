<?php $conexion = mysqli_connect('localhost', 'root', '', 'estudiantes');
mysqli_set_charset($conexion, 'utf8') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <title>Estudiantes</title>
</head>

<body>
    
    <h1>Base de datos: Estudiantes</h1>

    <div class="container-tabla">
        <?php $tabla = 'SELECT * FROM informacion'; ?>
        <div class="tabla">
            <div class="encabezado">
                <div class="elemento">Nombre</div>
                <div class="elemento">Apellido</div>
                <div class="elemento">Cédula</div>
                <div class="elemento">Ciudad</div>
                <div class="elemento">Teléfono</div>
                <div class="elemento">Correo</div>
                <div class="elemento">Carrera</div>
            </div>
            <div class="cuerpo">
                <?php $query = mysqli_query($conexion, $tabla);

                while ($registro = mysqli_fetch_assoc($query)) {
                    echo '<div class="registro">';
                    foreach ($registro as $dato) {
                        echo '<div class="elemento">'.$dato.'</div>';
                    }
                    echo"</div>";
                }?>
            </div>
        </div>
    </div>
</body>
</html>