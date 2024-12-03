<?php
// controlador.php

require 'modelo.php'; // Cargar el modelo
require 'vista.php';  // Cargar la vista

// Lógica del controlador
$productos = obtenerProductos(); // Llama al modelo para obtener los datos
mostrarProductos($productos);    // Pasa los datos a la vista para mostrarlos
