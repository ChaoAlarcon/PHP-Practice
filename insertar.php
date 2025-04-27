<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre) VALUES ('$nombre')";
$conexion->query($sql);

// Redirigir de vuelta a la página principal
header("Location: index.php");
exit();
?>
