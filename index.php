<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Usuarios</title>
</head>
<body>
    <h1>Agregar un nuevo usuario</h1>
    <form action="insertar.php" method="POST">
        <input type="text" name="nombre" placeholder="Escribe tu nombre" required>
        <button type="submit">Guardar</button>
    </form>

    <h2>Lista de usuarios:</h2>
    <?php include 'mostrar.php'; ?>
</body>
</html>
