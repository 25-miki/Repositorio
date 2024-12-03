<?php
// modelo.php

function conectaDb()
{
    $host = "localhost";
    $nombreBD = "videojuegos";
    $usuario = "root";
    $password = "";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8", $usuario, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        print "<p class=\"aviso\">Error: No puede conectarse con la base de datos. {$e->getMessage()}</p>\n";
        exit;
    }
}

function obtenerProductos()
{
    // Obtener la conexión a la base de datos
    $pdo = conectaDb();

    try {
        // Preparar y ejecutar la consulta
        $consultas = $pdo->prepare("SELECT * FROM videojuegos");
        $consultas->execute();

        // Obtener los resultados como un arreglo asociativo
        return $consultas->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "<p class=\"aviso\">Error al obtener los datos: {$e->getMessage()}</p>\n";
        return [];
    }
}
