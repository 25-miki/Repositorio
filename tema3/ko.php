<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Incorrecto</title>
</head>
<body>
    <h2>Identificación fallida</h2>
    <p><?php echo $error; ?></p>
    <p>Por favor, inténtalo de nuevo.</p>
    <form action="compruebaLogin.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Acceder">
    </form>
</body>
</html>
