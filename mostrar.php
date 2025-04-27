<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Leer todos los usuarios
$resultado = $conexion->query("SELECT * FROM usuarios");

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($fila['nombre']) . "</p>";
    }
} else {
    echo "<p>No hay usuarios registrados.</p>";
}

$conexion->close();
?>

