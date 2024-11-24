<?php
session_start(); // Iniciar la sesión

// Si el ID se pasa por POST o GET, se asigna a la variable $id
if (isset($_POST['idP'])) {
    $id = $_POST['idP'];
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    // Si no se recibe ningún ID, redirigir a galeria.php
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=galeria.php">';
    exit; // Detener la ejecución del script
}

include("conectbd.php");

if ($conexion) {
    $Resultado = mysqli_query($conexion, "SELECT * FROM `Productos` WHERE `idP` = '$id';");

    if ($Resultado && mysqli_num_rows($Resultado) > 0) {
        while ($row = mysqli_fetch_array($Resultado)) {
            // Aquí almacenamos el producto en el carrito (sesión)
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Agregar'])) {
                $cantidad = $_POST['cantidad'];

                // Verificamos si el carrito está inicializado
                if (!isset($_SESSION['carrito'])) {
                    $_SESSION['carrito'] = [];
                }

                // Si el producto ya está en el carrito, se actualiza la cantidad
                if (isset($_SESSION['carrito'][$id])) {
                    $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
                } else {
                    // Agregamos el producto al carrito con la cantidad seleccionada
                    $_SESSION['carrito'][$id] = [
                        'nombre' => $row['nombreP'],
                        'precio' => $row['precioP'],
                        'cantidad' => $cantidad
                    ];
                }

                // Alerta de producto agregado
                echo '<script>alert("Producto agregado al carrito");</script>';

                // Redirigir a galeria.php
                echo '<script>window.location.href="galeria.php";</script>';
            }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="css/estilos.css"/>
  <title>Agregar al Carrito</title>
  <style>
    section {
      display: flex;
      background-color: #cde4ff;
      min-height: 720px;
      width: 100%;
    }
    /* Encabezado */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #df3c26c6;
      color: white;
    }

    header img {
      width: 100px;
      height: auto;
    }

    header h1 {
      font-size: 2em;
      margin: 0;
      text-align: center;
      flex-grow: 1;
    }

    .producto-info {
      padding: 20px;
      margin-left: 20px;
    }

    .descripcion {
      margin-top: 20px;
      font-size: 1.2em;
      line-height: 1.5;
      width: 300px; /* Define un ancho para la descripción */
    }
  </style>
</head>
<body>
    <header>
        <img src="img/LogoDS.png" alt="Healthy Lifestyle CETI">
        <h1>Healthy Lifestyle CETI</h1>
    </header>
    <section>
        <img src="img/<?= $row['imagenP'] ?>" class="ImagenGal" alt="<?= $row['nombreP'] ?>" style="max-width: 300px;">
        <div class="producto-info">
            <h2><?= htmlspecialchars($row['nombreP']) ?></h2>
            <p>Precio: $<?= $row['precioP'] ?> MXN</p>
            <form action="agregar.php?id=<?= $id ?>" method="post">
                <input type="number" placeholder="Cantidad a Pedir" name="cantidad" size="8" max="<?= $row['existenciaP'] ?>" min="1" value="1">
                <input name="Agregar" type="submit" id="btnagregar" value="Agregar">
            </form>
            <table>
                <tr>
                    <td>
                        <p class="descripcion">
                            Descripción del producto: Este es un texto de descripción del producto que puedes personalizar según sea necesario. Aquí puedes agregar más detalles sobre las características del producto, su uso, etc.
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </section>
<?php
        }
    } else {
        echo "Producto no encontrado.";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=index.html">';
    }
} else {
    echo "Error en la conexión a la base de datos.";
}

if ($conexion) {
    mysqli_close($conexion);
}
?>
</section>
</body>
</html>
