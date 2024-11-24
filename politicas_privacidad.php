<?php
session_start();

// Verificamos el origen desde la URL
$origen = isset($_GET['origen']) ? $_GET['origen'] : 'index';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Políticas de Privacidad - Healthy Lifestyle CETI</title>
    <link rel="stylesheet" href="css/politicas.css"/>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            animation: fadeIn 1s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

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

        #privacy-content {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: justify;
        }

        h2 {
            color: #04669bc6;
        }

        /* Botón de retorno */
        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #df3c26c6;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #04669bc6;
        }

        footer {
            text-align: center;
            background: rgb(43, 48, 145);
            color: white;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="img/LogoDS.png" alt="Healthy Lifestyle CETI">
        <h1>Políticas de Privacidad</h1>
    </header>

    <div id="privacy-content">
        <center><p>17 de Octubre del 2024</p></center>
        <h2>Bienvenido a nuestras Políticas de Privacidad</h2>
        <p>En Healthy Lifestyle CETI, valoramos su privacidad y estamos comprometidos a proteger su información personal. Esta política describe cómo recopilamos, utilizamos y compartimos su información cuando utiliza nuestro sitio web, así como sus derechos en relación con esta información.</p>
        
        <h3>1. Recopilación de Información</h3>
        <p>Recopilamos información de varias maneras, incluyendo:</p>
        <ul>
            <li><strong>Información Personal:</strong> Cuando se registra en nuestro sitio, realiza una compra, se suscribe a nuestro boletín, o se comunica con nosotros. Esto puede incluir su nombre, dirección de correo electrónico, número de teléfono, dirección y otra información de contacto.</li>
            <li><strong>Datos de Uso:</strong> Recopilamos información sobre cómo utiliza nuestro sitio web, como su dirección IP, tipo de navegador, páginas visitadas, tiempo de permanencia y otras métricas de interacción.</li>
            <li><strong>Cookies y Tecnologías Similares:</strong> Utilizamos cookies, balizas web y otras tecnologías para recopilar información sobre su comportamiento en línea y mejorar su experiencia de usuario.</li>
            <li><strong>Información de Redes Sociales:</strong> Si interactúa con nosotros a través de plataformas de redes sociales, podemos recopilar información de su perfil de usuario de acuerdo con sus configuraciones de privacidad.</li>
        </ul>
        
        <h3>2. Uso de la Información</h3>
        <p>La información que recopilamos se utiliza para:</p>
        <ul>
            <li>Proporcionar y mantener nuestro servicio, así como mejorar su calidad.</li>
            <li>Personalizar su experiencia de usuario en el sitio.</li>
            <li>Entender y analizar cómo utiliza nuestro sitio para optimizar su contenido.</li>
            <li>Desarrollar nuevos productos, servicios y funcionalidades que sean de interés para nuestros usuarios.</li>
            <li>Comunicarle sobre productos, servicios, promociones y eventos que puedan interesarle.</li>
            <li>Proteger nuestros derechos y los de nuestros usuarios, así como investigar posibles violaciones a nuestras políticas.</li>
        </ul>
        
        <h3>3. Compartición de Información</h3>
        <p>No compartimos su información personal con terceros sin su consentimiento, a menos que sea requerido por la ley o en situaciones de emergencia. Podríamos compartir su información en las siguientes circunstancias:</p>
        <ul>
            <li>Con proveedores de servicios que nos ayudan a operar nuestro sitio y proporcionar servicios a nuestros usuarios, siempre bajo condiciones de confidencialidad.</li>
            <li>En respuesta a una solicitud legal, o para proteger la seguridad, propiedad o derechos de Healthy Lifestyle CETI y sus usuarios.</li>
            <li>En caso de fusiones, adquisiciones o venta de activos, donde su información personal podría ser parte de los activos transferidos.</li>
        </ul>

        <h3>4. Seguridad de la Información</h3>
        <p>Tomamos medidas razonables para proteger su información personal y mantenerla segura. Implementamos procedimientos de seguridad para proteger la información contra el acceso no autorizado, alteración, divulgación o destrucción. Sin embargo, ningún método de transmisión a través de Internet o método de almacenamiento electrónico es 100% seguro, por lo que no podemos garantizar su seguridad absoluta.</p>
        
        <h3>5. Derechos del Usuario</h3>
        <p>Como usuario de nuestro sitio, usted tiene derechos que le permiten:</p>
        <ul>
            <li>Acceder a su información personal que tenemos almacenada.</li>
            <li>Solicitar la corrección de datos inexactos o incompletos.</li>
            <li>Solicitar la eliminación de su información personal en ciertas circunstancias.</li>
            <li>Oponerse al procesamiento de su información personal o retirar su consentimiento cuando sea aplicable.</li>
            <li>Solicitar la portabilidad de sus datos, si es relevante.</li>
        </ul>

        <h3>6. Cambios en esta Política</h3>
        <p>Podemos actualizar nuestras políticas de privacidad de vez en cuando. Le notificaremos sobre cualquier cambio publicando la nueva política en esta página. Se recomienda revisar esta política periódicamente para mantenerse informado sobre cómo protegemos su información.</p>

        <h3>7. Compromiso de Transparencia</h3>
        <p>Nos comprometemos a ser transparentes sobre nuestras prácticas de privacidad. Si tiene preguntas sobre nuestras políticas o sobre cómo tratamos su información, no dude en ponerse en contacto con nosotros. Su confianza es fundamental para nosotros y estamos dedicados a proteger su información.</p>

        <h3>8. Contacto</h3>
        <p>Si tiene preguntas o inquietudes sobre nuestras políticas de privacidad, contáctenos a través de nuestro sitio web o en:</p>
        <p><strong>Email:</strong> a20300101@ceti.mx</p>
        <p><strong>Teléfono:</strong> ##-##-##-##-##</p>
        <p><strong>Dirección:</strong> CETI Plantel Tonalá, Calle Ejemplo 123, Tonalá, Jalisco, México.</p>

        <h2>Términos y Condiciones de Uso</h2>
        <h3>1. Propietario del Sitio Web</h3>
        <p>El propietario del sitio web es el Centro de Estudios Tecnológicos Industrial y de Servicios de CETI, Plantel Tonalá. Al utilizar este sitio, aceptas estar sujeto a estos Términos y Condiciones.</p>

        <h3>2. Uso del Sitio Web</h3>
        <p>Este sitio está destinado únicamente para fines informativos. Se prohíbe cualquier uso no autorizado, incluida la distribución, modificación o explotación comercial del contenido del sitio.</p>

        <h3>3. Propiedad Intelectual</h3>
        <p>Todo el contenido de este sitio, incluyendo textos, gráficos, logotipos, imágenes y software, es propiedad de CETI o de sus respectivos propietarios y está protegido por leyes de propiedad intelectual. No se permite el uso de contenido sin el permiso adecuado.</p>

        <h3>4. Modificaciones</h3>
        <p>CETI se reserva el derecho de modificar estos términos y condiciones en cualquier momento. Los cambios serán efectivos inmediatamente al ser publicados en el sitio web.</p>

        <h3>5. Limitación de Responsabilidad</h3>
        <p>CETI no será responsable de ningún daño directo, indirecto o consecuente que resulte del uso o la incapacidad para utilizar este sitio web.</p>

        <h3>6. Legislación Aplicable</h3>
        <p>Estos términos y condiciones se rigen por las leyes del estado de Jalisco, México.</p>

        <!-- Botón de Volver -->
        <p>
            <a class="back-button" href="<?php echo ($origen == 'registro.html') ? 'registro.html' : 'index.html'; ?>">Volver</a>
        </p>

        <center><p>Ultima Actualizacion - 18 de Octubre del 2024</p></center>
    </div>

    <footer>
        © 2024 Healthy Lifestyle CETI. Todos los derechos reservados.
    </footer>
</body>
</html>