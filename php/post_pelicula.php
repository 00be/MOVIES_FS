<?php
include_once ('conect.php');

if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

$id = isset($_POST['peliculaId']) ? $_POST['peliculaId'] : null;
$titulo = $_POST['titulo'];
$lanzamiento = $_POST['lanzamiento'];
$genero = $_POST['genero'];
$duracion = $_POST['duracion'];
$director = $_POST['director'];
$reparto = $_POST['reparto'];
$sinopsis = $_POST['sinopsis'];
$imagen = $_FILES['imagen']['name'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES['imagen']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo de imagen es una imagen real o un archivo fake
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if ($check !== false) {
        echo "El archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "El archivo no es una imagen.";
        $uploadOk = 0;
    }
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
    echo "Lo siento, el archivo ya existe.";
    $uploadOk = 0;
}

// Verificar el tamaño máximo del archivo (en este caso, 500KB)
if ($_FILES["imagen"]["size"] > 500000) {
    echo "Lo siento, el archivo es demasiado grande.";
    $uploadOk = 0;
}

// Permitir ciertos formatos de archivo
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
    $uploadOk = 0;
}

// Verificar si $uploadOk está establecido en 0 por algún error
if ($uploadOk == 0) {
    echo "Lo siento, tu archivo no fue subido.";
} else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        echo "El archivo " . htmlspecialchars(basename($_FILES["imagen"]["name"])) . " ha sido subido.";
    } else {
        echo "Lo siento, hubo un error al subir tu archivo.";
    }
}

// Preparar y ejecutar la consulta SQL para insertar o actualizar los datos en la tabla
if ($id) {
    // Actualizar película existente
    $sql = $conn->prepare("UPDATE peliculas SET titulo=?, lanzamiento=?, genero=?, duracion=?, director=?, reparto=?, sinopsis=?, imagen=? WHERE id=?");
    $sql->bind_param("ssssssssi", $titulo, $lanzamiento, $genero, $duracion, $director, $reparto, $sinopsis, $imagen, $id);
} else {
    // Insertar nueva película
    $sql = $conn->prepare("INSERT INTO peliculas (titulo, lanzamiento, genero, duracion, director, reparto, sinopsis, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssssss", $titulo, $lanzamiento, $genero, $duracion, $director, $reparto, $sinopsis, $imagen);
}

if ($sql->execute()) {
    echo "Registro insertado/modificado correctamente.";
} else {
    echo "Error: " . $sql->error;
}

$sql->close();
$conn->close();
?>


