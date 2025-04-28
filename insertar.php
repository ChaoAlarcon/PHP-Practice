<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$password = $_POST['password'];

if (empty($nombre) || empty($password)) {
    die("Error: Faltan datos del formulario.");
}

// Opcional: Encriptar la contraseña antes de guardarla
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la base de datos
$sql = "INSERT INTO usuarios (nombre, password) VALUES ('$nombre', '$password_hash')";
$conexion->query($sql);



$conexion->close();
?>
