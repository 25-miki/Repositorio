<?php

session_start();

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $nombreUsuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (isset($_POST['Recordar'])) {
        setcookie('user', $nombreUsuario, time() + 2592000);
        setcookie('password', $password, time() + 2592000);
    } else {
        setcookie('user', '', time() - 3600);
        setcookie('password', '', time() - 3600);
    }
}