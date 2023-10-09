<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $numero = $_POST["numero"];
    $ciudad = $_POST["ciudad"];

    
    $conn = new mysqli("localhost", "root", "", "ent_fin");

    
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    
    $sql = "UPDATE contacto SET nombre='$nombre', email='$email', numero='$numero', ciudad='$ciudad' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: control.php");
        exit;
    } else {
        echo "Error al actualizar el contacto: " . $conn->error;
    }

    
    $conn->close();
}
?>
