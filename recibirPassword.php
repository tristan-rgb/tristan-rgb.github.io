<?php
session_start();

// Conexión a la base de datos
include("conectbd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $Nombre = $_POST['txtNombre'];
    $Password = $_POST['txtPassword'];

    // Escapar las entradas para evitar inyección SQL
    $Nombre = mysqli_real_escape_string($conexion, $Nombre);
    $Password = mysqli_real_escape_string($conexion, $Password);

    // Consulta para verificar las credenciales
    $consulta = "SELECT * FROM `usuarios` WHERE `nombre`='$Nombre' AND `password`='$Password'";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    if (mysqli_num_rows($resultado) == 1) {
        // Obtener los datos del usuario
        $usuario = mysqli_fetch_assoc($resultado);

        // Guardar información del usuario en la sesión
        $_SESSION['usuario'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // Redirigir según el rol
        if ($usuario['rol'] === 'admin') {
            header("Location: admin_panel.php");
        } else {
            header("Location: index.php");
        }
        exit();
    } else {
        echo "<script>
                alert('Usuario o contraseña incorrectos.');
                window.location.href = 'index.php';
              </script>";
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
