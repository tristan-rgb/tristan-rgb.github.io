<?php
session_start(); // Iniciamos la sesión para usar el carrito

// Inicializamos el carrito si no está ya configurado
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Verificamos si se ha enviado alguna acción para actualizar o eliminar productos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['actualizar'])) {
        $id = $_POST['idP'];
        $nueva_cantidad = $_POST['cantidad'];
        
        if ($nueva_cantidad > 0 && isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad'] = $nueva_cantidad;
        } else {
            unset($_SESSION['carrito'][$id]); // Si la cantidad es 0 o menor, eliminamos el producto
        }
    }

    if (isset($_POST['eliminar'])) {
        $id = $_POST['idP'];
        unset($_SESSION['carrito'][$id]); // Eliminamos el producto del carrito
    }
}

// Mostramos los productos en el carrito
$carrito = $_SESSION['carrito'];

// Generar el archivo carrito.xml
if (!empty($carrito)) {
    $xml = new SimpleXMLElement('<carrito/>');

    foreach ($carrito as $id => $producto) {
        // Aseguramos que el nombre y precio están definidos antes de acceder
        $nombre = isset($producto['nombre']) ? htmlspecialchars($producto['nombre']) : 'Producto desconocido';
        $precio = isset($producto['precio']) ? number_format($producto['precio'], 2) : 0.00;

        $item = $xml->addChild('producto');
        $item->addChild('id', $id);
        $item->addChild('nombre', $nombre);
        $item->addChild('precio', $precio);
        $item->addChild('cantidad', $producto['cantidad']);
        $item->addChild('subtotal', number_format($precio * $producto['cantidad'], 2));
    }

    // Calculamos el total
    $total = 0;
    foreach ($carrito as $producto) {
        $total += (isset($producto['precio']) ? $producto['precio'] : 0) * $producto['cantidad'];
    }
    $xml->addChild('total', number_format($total, 2) . ' MXN');

    // Guardamos el archivo XML
    $xml->asXML('carrito.xml');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <style>
        /* Centrar el contenido */
        body {
            text-align: center;
            font-family: Arial, sans-serif;
        }
        /* Encabezado */
        header h1 {
            margin: 20px 0;
            font-size: 2em;
        }
        /* Centramos la tabla */
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        /* Quitamos los bordes de la tabla, celdas y cabecera */
        table, th, td {
            border: none;
        }
        /* Estilizamos las celdas */
        th, td {
            padding: 10px;
            text-align: center;
        }
        /* Estilos opcionales para las filas */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        /* Centrar el botón y los enlaces */
        .boton, a {
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .boton:hover, a:hover {
            background-color: #0056b3;
        }
        /* Ajustar el tamaño del input de cantidad */
        input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
        }
        .boton-accion {
            padding: 10px 20px;
            background-color: #f4a261;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Healthy Lifestyle CETI - Carrito de Compras</h1>
    </header>

    <section>
        <h2>Productos en tu Carrito</h2>

        <?php if (empty($carrito)): ?>
            <p>Tu carrito está vacío. <a href="galeria.php">Volver al catálogo</a></p>
        <?php else: ?>
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
                <?php 
                $total = 0;
                foreach ($carrito as $id => $producto): 
                    $subtotal = (isset($producto['precio']) ? $producto['precio'] : 0) * $producto['cantidad'];
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?= htmlspecialchars($producto['nombre']) ?></td>
                    <td>$<?= number_format(isset($producto['precio']) ? $producto['precio'] : 0, 2) ?> MXN</td>
                    <td>
                        <form action="carrito.php" method="post">
                            <input type="hidden" name="idP" value="<?= $id ?>">
                            <input type="number" name="cantidad" value="<?= $producto['cantidad'] ?>" min="1">
                            <button type="submit" name="actualizar" class="boton-accion">Actualizar</button>
                        </form>
                    </td>
                    <td>$<?= number_format($subtotal, 2) ?> MXN</td>
                    <td>
                        <form action="carrito.php" method="post">
                            <input type="hidden" name="idP" value="<?= $id ?>">
                            <button type="submit" name="eliminar" class="boton-accion">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Total a pagar:</strong></td>
                    <td colspan="2"><strong>$<?= number_format($total, 2) ?> MXN</strong></td>
                </tr>
            </table>
            <br>
            <a href="galeria.php">Seguir comprando</a>
            <a href="index.html">Terminar Compra</a>
        <?php endif; ?>
    </section>
</body>
</html>
