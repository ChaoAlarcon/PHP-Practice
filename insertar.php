<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$telefono = isset($_POST['telefono']) ? trim($_POST['telefono']) : '';

if (empty($telefono)) {
    die("El campo teléfono está vacío. Por favor, ingrese un número de teléfono.");
}

// Insertar en la base de datos usando prepared statements
$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, telefono) VALUES (?, ?)");
$stmt->bind_param("ss", $nombre, $telefono);
$stmt->execute();
$stmt->close();

// Mostrar la lista actualizada de usuarios
$resultado = $conexion->query("SELECT id, nombre, telefono FROM usuarios");

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($fila['nombre']) . " - " . htmlspecialchars($fila['telefono']) . 
             " <button class='eliminar' data-id='" . $fila['id'] . "'>Eliminar</button></p>";
    }
}



$conexion->close();
?>
