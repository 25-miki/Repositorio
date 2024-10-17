<?php
session_start();

if (isset($_COOKIE['user'])) {
    $nombreUsuario = $_COOKIE['user'];
} else {
    $nombreUsuario = 'miki'; 
    setcookie('user', $nombreUsuario , time() + 1000);
     
}

echo "Hola, $nombreUsuario!<br>";
?>
