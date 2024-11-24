<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Guardar Datos en BD</title>
</head>

<body>
<?php

if ($_POST) {
    $Nombre = $_POST['txtNombre'];
    $ApellidoP = $_POST['txtApellidoP'];
    $ApellidoM = $_POST['txtApellidoM'];
    $Telefono = $_POST['txtTelefono'];
    $Correo = $_POST['txtCorreo'];
    $Password = $_POST['txtPassword'];

    echo "Bienvenido " . $Nombre;

    include("conectbd.php");

    // Verificar conexión a la base de datos
    if ($conexion) {
        $Resultado = mysqli_query($conexion,"INSERT INTO`healthylife`.`alumnos` (`idUsuario`,`nombre`,`apellidoP`,`apellidoM`,`telefono`,`correo`,`password`) VALUES (NULL, '$Nombre', '$ApellidoP', '$ApellidoM', '$Telefono', '$Correo', '$Password');");

        if ($Resultado) {
            echo "¡Gracias! Hemos recibido sus datos.\n";
            echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=prueba.html">';
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    } else {
        echo "Error de conexión a la base de datos";
    }
} else {
    echo "Error no seas tramposo";
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=registro.html">';
}

?>

</body>
</html>
