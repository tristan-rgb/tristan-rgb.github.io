<?php
// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "healthylife");

// Verificar la conexión
if (!$conexion) {
    die("Fallo en el establecimiento de la conexion: " . mysqli_connect_error());
}

// Establecer la codificación de caracteres a UTF-8
mysqli_set_charset($conexion, "utf8");

// Si necesitas hacer más operaciones con la base de datos, puedes hacerlas aquí
?>
