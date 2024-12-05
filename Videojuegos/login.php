<?php
session_start();
require_once "videojuego.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pdo = conectaDb();

    // Buscar al usuario en la base de datos
    $consulta = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $consulta->bindParam(':username', $username);
    $consulta->execute();
    $usuario = $consulta->fetch();

    // Verificar si el usuario existe y si la contraseña es válida
    if ($usuario && password_verify($password, $usuario['password'])) { 
        $_SESSION['usuario'] = $usuario['username'];
        header("Location: inicio.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
    $pdo = null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
        <form method="POST" action="login.php">
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>
