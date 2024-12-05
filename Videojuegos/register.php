<?php
require_once "videojuego.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Crear un hash seguro de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $pdo = conectaDb();

    // Insertar el nuevo usuario en la base de datos
    $insercion = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
    $insercion->bindParam(':username', $username);
    $insercion->bindParam(':password', $hashedPassword);

    if ($insercion->execute()) {
        echo "Usuario registrado con éxito.";
        header("Location: login.php"); // Redirigir al login después del registro
        exit;
    } else {
        echo "Error al registrar el usuario.";
    }

    $pdo = null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</body>
</html>
