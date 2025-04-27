<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir el ID del usuario a eliminar
$id = $_POST['id'];

// Eliminar el usuario de la base de datos
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

// Mostrar la lista actualizada de usuarios
$resultado = $conexion->query("SELECT * FROM usuarios");

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($fila['nombre']) . 
             " <button class='eliminar' data-id='" . $fila['id'] . "'>Eliminar</button></p>";
    }
}

$conexion->close();
?>
