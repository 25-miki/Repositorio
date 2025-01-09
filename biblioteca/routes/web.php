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

Route::get('/', function () {
    return view('inicio');
    });