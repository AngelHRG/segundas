<?php
include "conexion.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);

    $stmt = mysqli_prepare($conexion, "DELETE FROM usuarios WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<p style='color: green; text-align: center;'>Usuario eliminado correctamente.</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error al eliminar el usuario.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);
} else {
    echo "<p style='color: red; text-align: center;'>ID inválido.</p>";
}
?>

<p style="text-align: center;">
    <a href="index.php">Volver al listado</a>
</p>