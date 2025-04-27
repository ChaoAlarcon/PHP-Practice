<?php
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar todos los registros
$conexion->query("DELETE FROM usuarios");

// Reiniciar el contador de AUTO_INCREMENT
$conexion->query("ALTER TABLE usuarios AUTO_INCREMENT = 1");

$conexion->close();
?>
