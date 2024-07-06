<?php
// Conectar a la base de datos
include_once ('conect.php');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Eliminar la película
    $sql = "DELETE FROM peliculas WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Película eliminada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
