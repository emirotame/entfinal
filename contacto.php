<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Estilos para la barra de navegación */
        nav {
            background-color: #000000;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        nav a {
            color: #4ffa24;
            text-decoration: none;
            margin: 10px;
        }

        /* Estilos para el pie de página */
        footer {
            background-color: #000000;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        footer a {
            color: #4ffa24;
            text-decoration: none;
            margin: 10px;
        }
    </style>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container">
        <h1 align="center">Contáctanos</h1>
        
        <?php include("formulario.php"); ?>
    </div>

    <?php include("footer.php"); ?>
</body>
</html>
