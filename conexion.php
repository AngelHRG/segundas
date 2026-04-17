<?php
$host     = "localhost";
$usuario  = "root";          
$clave    = "";
$base     = "recuperacion_php";

$conexion = mysqli_connect($host, $usuario, $clave, $base);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>