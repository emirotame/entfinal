<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    
    $conn = new mysqli("localhost", "root", "", "ent_fin");

    
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    
    $sql = "DELETE FROM contacto WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: control.php");
        exit;
    } else {
        echo "Error al eliminar el contacto: " . $conn->error;
    }

    
    $conn->close();
}
?>
