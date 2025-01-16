<?php
session_start();

// Eliminar la cookie estableciendo su tiempo de expiración en el pasado
setcookie('nombreUsuario', '', time() - 1);

// Destruir la sesión
session_unset();
session_destroy();

echo "Tu sesión ha sido cerrada y la cookie ha sido eliminada.<br>";
echo '<a href="cookies.php">Volver al inicio</a>';
?>
