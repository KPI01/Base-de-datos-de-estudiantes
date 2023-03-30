<?php 
ob_start();
include '../index.php';
$id = $_GET['id'];
//Conexion con base de datos
$conexion = new mysqli('localhost', 'root', '', 'estudiantes');

//Sentencia SQL
$query = "DELETE FROM `informacion` WHERE `id`=$id";

if ($conexion->connect_errno) {
    echo '<div class="error">Ha ocurrido un erro al conectar con la base de datos: ' . $conexion->connect_error . '</div>';
} else {
    $sql = $conexion->query($query);
}

$conexion->close();
header("Location:../index.php");
ob_end_flush();
?>