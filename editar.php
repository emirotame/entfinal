<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    
    <style>
        
        body {
            font-family: 'Roboto', sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .center-text {
            text-align: center;
        }

        
        h1 {
            text-align: center;
        }

        
        label {
            display: block;
            margin-bottom: 10px;
        }

        
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Contacto</h1>

        <?php
        
        if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
            $id = $_GET["id"];

            
            $conn = new mysqli("localhost", "root", "", "ent_fin");

            
            if ($conn->connect_error) {
                die("Error de conexión a la base de datos: " . $conn->connect_error);
            }

            
            $sql = "SELECT * FROM contacto WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                
                ?>
                <form action="ed_con.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required><br>

                    <label for="email">Email de Contacto:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

                    <label for="numero">Número de Contacto:</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $row['numero']; ?>" required><br>

                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" value="<?php echo $row['ciudad']; ?>" required><br>

                    <input type="submit" value="Guardar Cambios">
                </form>
                <?php
            } else {
                echo "No se encontró el contacto.";
            }

            
            $conn->close();
        } else {
            echo "ID de contacto no válido.";
        }
        ?>

        
        <div class="center-text">
            <a href="control.php">Volver a la Lista de Contactos</a>
        </div>
    </div>
</body>
</html>
