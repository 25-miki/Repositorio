<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('salut', function()
{
return 'Hola món!';
});

Route::get('catalog/show/{id?}', function($id="nada")
{
return "Vista detalle película $id";
});

Route::get('saludo/{nombre?}/{id?}', function($nombre="Invitado", $id=0) {
    return "Hola $nombre, tu código es el $id";
    })->where('nombre', "[A-Za-z]+")
    ->where('id', "[0-9]+")
    ->name('saludo');

Route::get('tabla/{numero?}', function($numero="3"){
    for($i = 1; $i<11; $i++ ){
        echo $i . " x" . $numero . " = " . $i*$numero . "<br>";
    }
});


Route::view('/', 'inicio', ['nombre' => 'Miki']);

Route::get('listado', function() {
    $libros = array(
    array("titulo" => "El juego de Ender",
    "autor" => "Orson Scott Card"),
    array("titulo" => "La tabla de Flandes",
    "autor" => "Arturo Pérez Reverte"),
    array("titulo" => "La historia interminable",
    "autor" => "Michael Ende"),
    array("titulo" => "El Señor de los Anillos",
    "autor" => "J.R.R. Tolkien")
    );
    return view('listado', compact('libros'));
    })->name('listado_libros');