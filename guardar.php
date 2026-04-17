<?php
include "conexion.php";

if ($_POST) {
    $nombre = trim($_POST["nombre"]);
    $correo = trim($_POST["correo"]);
    $edad   = trim($_POST["edad"]);

    $error = "";

    
    if (empty($nombre)) {
        $error = "El nombre no puede estar vacío.";
    } elseif (empty($correo)) {
        $error = "El correo no puede estar vacío.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $error = "El correo no tiene un formato válido.";
    } elseif (empty($edad)) {
        $error = "La edad no puede estar vacía.";
    } elseif (!is_numeric($edad) || $edad < 1) {
        $error = "La edad debe ser un número válido.";
    }

    if ($error) {
        echo "<p style='color: red; text-align: center;'>$error</p>";
        echo "<p style='text-align: center;'><a href='index.php'>Volver</a></p>";
        exit;
    }

    
    $stmt = mysqli_prepare($conexion, "INSERT INTO usuarios (nombre, correo, edad) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssi", $nombre, $correo, $edad);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green; text-align: center;'>Usuario guardado correctamente.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error al guardar el usuario.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    header("Location: index.php");
}
?>

<p style="text-align: center;">
    <a href="index.php">Volver al formulario</a>
</p>