<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="{{ asset('css/app-log.css') }}">
</head>
<body>

    <div class="container">
        <img src="css/fruits.png" style="width: 200px; margin-top: 20px;" alt="">
        <h1>Iniciar sesión</h1>

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email">Correo electrónico:</label>
            <input type="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>

        <p>¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate aquí</a></p>
    </div>

</body>

</html>
