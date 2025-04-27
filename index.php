<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "demo_web");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener la lista de usuarios
$resultado = $conexion->query("SELECT * FROM usuarios");

$usuarios = [];
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $usuarios[] = $fila;
    }
}
$conexion->close();


//-----------------------------------------------------------
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    
    <form id="formulario">
        <input type="text" id="nombre" placeholder="Nombre" required>
        <button type="submit">Agregar</button>
        
    </form>

   

    <div id="listaUsuarios">
        <?php
        // Mostrar la lista de usuarios con el botón de eliminar
        foreach ($usuarios as $usuario) {
            echo "<p>" . htmlspecialchars($usuario['nombre']) . 
                 " <button class='eliminar' data-id='" . $usuario['id'] . "'>Eliminar</button></p>";
        }
        ?>
    </div>

    <script src="main.js"></script>

    <button id="reiniciar">Reiniciar IDs</button>

<script>
    // Código JavaScript para manejar el botón de reinicio
    document.getElementById("reiniciar").addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "reiniciar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status == 200) {
                alert("IDs reiniciados exitosamente.");
                location.reload(); // Recargar la página para reflejar los cambios
            } else {
                alert("Hubo un error al reiniciar los IDs.");
            }
        };

        xhr.send(); // No necesitas enviar ningún dato extra
    });
</script>
</body>
</html>
