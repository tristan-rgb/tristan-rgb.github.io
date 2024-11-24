<?php
include("conectbd.php");

// Configuración de paginación
$productos_por_pagina = 15;
$pagina_actual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$total_resultado = mysqli_query($conexion, "SELECT COUNT(*) AS total FROM productos WHERE existenciaP > 2");
$total_filas = mysqli_fetch_assoc($total_resultado)['total'];
$total_paginas = ceil($total_filas / $productos_por_pagina);

// Calcular el inicio para los productos de la página actual
$inicio = ($pagina_actual - 1) * $productos_por_pagina;
$Resultado = mysqli_query($conexion, "SELECT * FROM Productos WHERE existenciaP > 2 LIMIT $inicio, $productos_por_pagina");

// Filtrar productos por búsqueda
$termino_busqueda = isset($_GET['busqueda']) ? strtolower(trim($_GET['busqueda'])) : '';
if (!empty($termino_busqueda)) {
    $Resultado = mysqli_query($conexion, "SELECT * FROM Productos WHERE (LOWER(nombreP) LIKE '%$termino_busqueda%' OR LOWER(marcaP) LIKE '%$termino_busqueda%') AND existenciaP > 2 LIMIT $inicio, $productos_por_pagina");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
	<link rel="stylesheet" href="css/estilos.css"/>
    <style>
        /* Estilos básicos */
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
            }

        /* Estilos del encabezado */
        header {
            text-align: center;
            color: #000000;
            background: linear-gradient(to right, #99EDC3, #ADD8E6); /* Gradiente */
            }

        /* Barra de búsqueda */
        .search-bar {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 20px 0;
            }

            /* Menú de navegación */
        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            padding: 0;
            margin: 0;
            background-color: #04669bc6;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            padding: 15px 20px;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #df3c26c6;
            border-radius: 5px;
        }
        .search-bar input[type="text"] {
            width: 50%;
            padding: 10px;
            font-size: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            }

        .search-bar button,
        .search-bar .carrito-button {
            padding: 10px 30px;
            font-size: 18px;
            border-radius: 5px;
            background-color: #6C3483; /* Color de fondo del botón */
            color: white;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none; /* Para botones sin estilo de enlace */
            }

        .search-bar button:hover,
        .search-bar .carrito-button:hover {
            background-color: #6C3483; /* Color en hover */
            }

        /* Estilo de productos */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
            }

        .product {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: calc(33% - 20px);
            box-sizing: border-box;
            height: 400px; /* Altura fija para las cajas */
            text-align: center;
        }

        .product img {
            max-width: 100%;
            height: 200px; /* Altura fija para las imágenes */
            object-fit: cover; /* Asegura que las imágenes mantengan proporciones */
            border-radius: 5px;
        }

        .product h3,
        .product p {
            margin: 10px 0;
        }

        .product .ver-detalles {
            margin-top: 10px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #6C3483;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .product .ver-detalles:hover {
        background-color: #6C3483;
        }

        /* Estilos de paginación */
        .pagination {
            text-align: center;
            margin: 20px 0;
            }

        .pagination a {
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
            border-radius: 5px;
            }

        .pagination a:hover {
            background-color: #ddd;
            }

        .pagination .active {
            background-color: #333;
            color: white;
            }
</style>
</head>
<body>
        <header>
            <table style="border: none; background-color: inherit;">
                <tr>
                    <td width="30%" style="border:none">
                        <a href="index.html">
                        <img src="img/LogoDS.png" id="LogoTipo" alt="Healthy Lifestyle CETI" width="120em" height="120em">
                    </a>
                    <td align="center" width="60%" style="border: none">
                        <h1>Healthy Lifestyle CETI</h1>
                    </td>
                </tr>
            </table>
        </header>
        <nav>
    <ul>
        <li><a title="Inicio" href="index.html">Inicio</a></li>
        <li>
            <a title="CRUD" href="galeria.php">Control de Productos</a>
        </li>
    </ul>
</nav>


<div class="container">

    <!-- Barra de búsqueda -->

    <div class="search-bar">
    <form action="" method="GET">
        <input type="text" name="busqueda" placeholder="Buscar producto..." value="<?php echo htmlspecialchars($termino_busqueda); ?>">
        <button type="submit">Buscar</button>
        <!-- Botón de Carrito -->
        <a href="carrito.php" class="carrito-button">Carrito</a>
    </form>
    </div>


    <!-- Mostrar productos -->
    <div class="product-grid">
        <?php if (mysqli_num_rows($Resultado) > 0) : ?>
            <?php while ($row = mysqli_fetch_array($Resultado)) : ?>
                <div class="product">
                    <img src="img/<?php echo $row['imagenP']; ?>" alt="<?php echo $row['nombreP']; ?>">
                    <h3><?php echo $row['nombreP']; ?></h3>
                    <p><?php echo $row['marcaP']; ?></p>
                    <p><strong>Precio: $<?php echo $row['precioP']; ?> MNX</strong></p>
                    <a href="agregar.php?id=<?php echo $row['idP']; ?>" class="ver-detalles">Ver detalles</a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No se encontraron productos.</p>
        <?php endif; ?>
    </div>

    <!-- Paginación -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_paginas; $i++) : ?>
            <a href="?pagina=<?php echo $i; ?>" class="<?php if ($i == $pagina_actual) echo 'active'; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>

</div>

<?php mysqli_close($conexion); ?>
</body>
</html>