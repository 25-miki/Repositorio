<?php

$usuarios = [
    "usuario1" => "contraseña1",
    "usuario2" => "contraseña2"
];

if (isset($_POST['nuevo_usuario']) && isset($_POST['nueva_password'])) {
    $nuevo_usuario = $_POST['nuevo_usuario'];
    $nueva_password = $_POST['nueva_password'];

    if (isset($usuarios[$nuevo_usuario])) {
        echo "El usuario ya existe. Intenta con otro nombre de usuario.<br>";
    } else {
        $usuarios[$nuevo_usuario] = $nueva_password;
        echo "Usuario agregado exitosamente!<br>";
    }
}

if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if (isset($usuarios[$usuario])) {
        if ($usuarios[$usuario] == $password) {
            include('ok.php');
        } else {
            $error = "La contraseña es incorrecta.";
            include('ko.php');
        }
    } else {
        $error = "El usuario no existe.";
        include('ko.php');
    }
}


