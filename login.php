<?php
session_start();

// Conexión a la base de datos
include("conectbd.php");

// Verificar el método de solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $Nombre = $_POST['nombre'];
    $password = $_POST['password'];

    // Escapar las entradas para evitar inyección SQL
    $Nombre = mysqli_real_escape_string($conexion, $Nombre);
    $password = mysqli_real_escape_string($conexion, $password);

    // Consulta para verificar las credenciales
    $resultado = mysqli_query($conexion, "SELECT * FROM `alumnos` WHERE `nombre`='$Nombre' AND `password`='$password'");

    if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
    }

    // Comprobar si el usuario existe
    if (mysqli_num_rows($resultado) == 1) {
        // Obtener los datos del usuario
        $usuario = mysqli_fetch_assoc($resultado);
        $nombreUsuario = $usuario['nombre'];

        // Guardar el nombre en la sesión
        $_SESSION['username'] = $nombreUsuario;

        // Mostrar mensaje de bienvenida con alert y redirigir a bienvenida.html
        echo "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Bienvenido</title>
            <script>
                alert('¡Bienvenido de nuevo, " . htmlspecialchars($nombreUsuario) . "!');
                window.location.href = 'bienvenida.html'; // Redirigir a bienvenida.html
            </script>
        </head>
        <body>
        </body>
        </html>
        ";
    } else {
        // Mensaje de error para usuario no encontrado
        echo "<script>
                alert('Usuario o contraseña incorrectos.');
                window.location.href = 'prueba.html';
              </script>";
        exit();
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
