<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Contactos</title>
    
    <style>
        
        body {
            font-family: 'Tahoma', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        
        h1 {
            text-align: center;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        
        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            color: #555;
        }

        
        .add-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Contactos</h1>

        <?php
        
        $conn = new mysqli("localhost", "root", "", "ent_fin");

        
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        
        $consulta = "SELECT * FROM contacto";
        $resultado = $conn->query($consulta);

        if ($resultado->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Ciudad</th><th>Acciones</th></tr>";

            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . $fila['nombre'] . "</td>";
                echo "<td>" . $fila['email'] . "</td>";
                echo "<td>" . $fila['numero'] . "</td>";
                echo "<td>" . $fila['ciudad'] . "</td>";
                echo "<td><a href='editar.php?id=" . $fila['id'] . "'>Editar</a> | <a href='eliminar.php?id=" . $fila['id'] . "'>Eliminar</a></td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No hay contactos registrados.";
        }

        
        $conn->close();
        ?>

        
        <a class="add-link" href="contacto.php">Agregar Nuevo Contacto</a>
    </div>
</body>
</html>
