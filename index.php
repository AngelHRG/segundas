<?php
include "conexion.php";

// Obtener usuarios
$query  = "SELECT id, nombre, correo, edad FROM usuarios ORDER BY id";
$result = mysqli_query($conexion, $query);

$usuarios = [];
if ($result && mysqli_num_rows($result) > 0) {
    $usuarios = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conexion);
?>