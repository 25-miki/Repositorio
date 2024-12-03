<?php
// vista.php

function mostrarProductos($consultas)
{
    echo "<h1>Lista de productos</h1>";

    // Verificar si la lista tiene datos
    if (!empty($consultas)) {
        echo "<ul>";
        foreach ($consultas as $consulta) {
            echo "<li>{$consulta['nombre']}  -  " . number_format($consulta['precio'], 2) . " €</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay productos disponibles.</p>";
    }
}
