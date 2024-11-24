<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Lifestyle CETI</title>
    <link rel="stylesheet" href="css/estilos.css"/>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        /* Animación de desvanecimiento */
        .fade-out {
            animation: fadeOut 1s forwards;
        }

        @keyframes fadeOut {
            0% { opacity: 1; }
            100% { opacity: 0; transform: scale(0.95); }
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
            padding: 15px 30px;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: #df3c26c6;
            border-radius: 5px;
        }

        /* Estilo para la opción de Políticas de Privacidad en el footer */
        .privacy-policy {
            color: black;
            text-decoration: underline;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }

        .privacy-policy:hover {
            color: whitesmoke;
        }

        /* Contenido principal */
        #main-content {
            text-align: center;
            padding: 60px 20px;
            background-color: #fff;
        }

        #main-content img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        #main-content h2 {
            font-size: 1.8em;
            color: #04669bc6;
        }

        /* Sección "Lo más buscado" */
        #most-searched {
            background-color: #f4f4f4;
            padding: 60px 20px;
        }

        #most-searched h1 {
            font-size: 3.2em;
            color: #df3c26c6;
            margin-bottom: 30px;
        }

        /* Footer */
        footer {
            text-align: center;
            color: white;
            padding: 30px 20px;
        }

        footer h2 {
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        footer a img {
            width: 30px;
            height: 30px;
            margin: 0 10px;
            transition: transform 0.3s;
        }

        footer a img:hover {
            transform: rotate(360deg);
        }

        /* Estilos para la sección de "Lo más buscado" */
        #most-searched {
            background-color: #f4f4f4;
            padding: 50px 40px;
            text-align: center;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        #most-searched ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        #most-searched ul li {
            background-color: #fff;
            padding: 20px;
            margin: 15px;
            text-align: center;
            border: 1px solid #ddd;
            width: 250px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.3s;
        }

        #most-searched ul li:hover {
            transform: scale(1.05);
        }

        .product-image {
            width: 200px;
            height: 200px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .product-link, .more-link {
            text-decoration: none;
            color: #04669b;
            font-weight: bold;
            display: block;
            margin-top: 10px;
            transition: color 0.3s;
        }

        .product-link:hover, .more-link:hover {
            color: #df3c26;
        }

        .more-products {
            position: relative;
            text-align: right;
            margin-top: -20px;
        }

        .more-products .more-link {
            color: #04669b;
            font-size: 1.2em;
            text-decoration: none;
            font-weight: bold;
        }

        .more-products .more-link:hover {
            color: #df3c26;
        }

        /* Ajustes para dispositivos móviles */
        @media (max-width: 768px) {
            #most-searched ul {
                flex-direction: column;
            }

            #most-searched ul li {
                width: 100%;
            }
        }
    </style>
    <script>
        function animateAndRedirect(event, url) {
            event.preventDefault();
            document.body.classList.add('fade-out');
            setTimeout(function() {
                window.location.href = url;
            }, 1000);
        }
    </script>
</head>

<body>
    <header>
        <img src="img/LogoDS.png" alt="Healthy Lifestyle CETI">
        <h1>Healthy Lifestyle CETI</h1>
    </header>

    <nav>
    <ul>
            <li><a href="galeria.php" title="Catálogo">Catálogo</a></li>
            <li><a href="cursos.html" title="Cursos">Cursos</a></li>
            <?php
            if (isset($_SESSION["usuario"])) {
                echo '<li>Bienvenido, ' . htmlspecialchars($_SESSION["usuario"]) . '</li>';
                if ($_SESSION["rol"] === 'admin') {
                    echo '<li><a href="admin_panel.php" title="Panel de Administrador">Panel de Admin</a></li>';
                }
                echo '<li><a href="cerrar_sesion.php" title="Cerrar Sesión">Cerrar Sesión</a></li>';
            } else {
                echo '<li><a href="prueba.html" title="Iniciar Sesión">Iniciar Sesión</a></li>';
            }
            ?>
        </ul>
    </nav>

    <div id="main-content">
        <section id="content">
            <img src="img/paz.png" alt="Imagen de paz">
            <h2>No te preocupes por lo que no puedes cambiar. Enfócate en lo que sí puedes.</h2>
        </section>
    </div>

    <section id="most-searched">
        <h1>Lo más buscado</h1>
        <ul>
            <li>
                <img src="img/1.png" alt="Velas Aromáticas" class="product-image">
                <p><strong>Velas Aromáticas</strong></p>
                <p><strong>Yankee Candle</strong></p>
                <p><strong>Precio: $150 MXN</strong></p>
                <a href="agregar.php?id=1" class="product-link">Ver detalles</a>
            </li>
            <li>
                <img src="img/2.png" alt="Velas Aromáticas" class="product-image">
                <p><strong>MEN UNDERSTANDING MALE EMOTIONS</strong></p>
                <p><strong>Phychology Today</strong></p>
                <p><strong>Precio: $230 MXN</strong></p>
                <a href="agregar.php?id=1" class="product-link">Ver detalles</a>
            </li>
        </ul>
        <div class="more-products">
            <a href="galeria.php" title="Ver más" class="more-link">Ver más productos...</a>
        </div>
    </section>

    <footer>
        <h2>¡Contáctanos!</h2>
        <a href="http://www.facebook.com">
            <img src="img/logoFace.png" alt="Facebook">
        </a>
        <a href="http://www.whatsapp.com">
            <img src="img/logoWhats.png" alt="WhatsApp">
        </a>
        <br>
        <h1><a href="politicas_privacidad.php" class="privacy-policy">Políticas de Privacidad</a></h1>
    </footer>
</body>
</html>