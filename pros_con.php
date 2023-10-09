<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $ciudad = $_POST["ciudad"];

    
    $conn = new mysqli("localhost", "root", "", "ent_fin");

    
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO contacto (nombre, email, numero, ciudad) VALUES ('$nombre', '$email', '$numero', '$ciudad')";

    if ($conn->query($sql) === TRUE) {
        header("Location: contacto.php");
        exit;
    } else {
        echo "Error al registrar el contacto: " . $conn->error;
    }

    
    $conn->close();
}
?>
