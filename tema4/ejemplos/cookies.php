<?php
session_start();

// Comprobar si ya se ha enviado un nombre y si existe una cookie con ese nombre
if (isset($_POST['nombre'])) {
    $nombreUsuario = $_POST['nombre'];
    // Crear una cookie con el nombre del usuario que dure 1 día (86400 segundos)
    setcookie('nombreUsuario', $nombreUsuario, time() + 86400);
} elseif (isset($_COOKIE['nombreUsuario'])) {
    $nombreUsuario = $_COOKIE['nombreUsuario'];
} else {
    $nombreUsuario = "Invitado";
}

// Comprobar si la sesión tiene un contador de visitas
if (!isset($_SESSION['visitas'])) {
    $_SESSION['visitas'] = 0;
}

// Incrementar el contador de visitas
$_SESSION['visitas']++;

// Mostrar el nombre del usuario y el número de visitas
echo "Hola, $nombreUsuario!<br>";
echo "Has visitado esta página " . $_SESSION['visitas'] . " veces durante esta sesión.<br>";

// Formulario para ingresar el nombre si no hay cookie
if (!isset($_COOKIE['nombreUsuario'])) {
    echo '<form method="POST" action="cookies.php">
            <label>Introduce tu nombre:</label>
            <input type="text" name="nombre" required>
            <input type="submit" value="Guardar nombre">
          </form>';
} else {
    echo '<a href="logout.php">Cerrar sesión</a>';
}
?>
