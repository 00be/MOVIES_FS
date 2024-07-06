<?php
// Conectar a la base de datos
include_once ('conect.php');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id, titulo, duracion, genero, imagen FROM peliculas LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['duracion'] . "</td>";
        echo "<td>" . $row['genero'] . "</td>";
        echo "<td><img src='../img/" . $row['imagen'] . "' alt='" . $row['titulo'] . "' style='width: 150px;'></td>";
        echo "<td>
                <button class='btn btn-warning btn-sm' onclick='modificarPelicula(" . $row['id'] . ")'>Modificar</button>
                <button class='btn btn-danger btn-sm' onclick='eliminarPelicula(" . $row['id'] . ")'>Eliminar</button>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay películas</td></tr>";
}

$conn->close();
?>


