﻿<?php
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
