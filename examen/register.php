<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    $pdo = conectaDb();

    $insercion = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
    $insercion->bindParam(':username', $username);
    $insercion->bindParam(':password', $hashedPassword);

    if ($insercion->execute()) {
        header("Location: login.php");
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
