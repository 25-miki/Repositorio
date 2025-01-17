<?php

use Illuminate\Support\Facades\Route;

$cortos = [
    [
        'id' => 1,
        'titulo' => 'El corto más cortante',
        'director' => 'María Martín',
        'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    ],
    [
        'id' => 2,
        'titulo' => 'Sin más',
        'director' => 'Pepa Pérez',
        'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    ],
    [
        'id' => 3,
        'titulo' => 'Más o menos',
        'director' => 'Juan Jiménez',
        'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    ],
    [
        'id' => 4,
        'titulo' => 'Tira pa\' ya',
        'director' => 'Sofía Sofín',
        'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    ],
    [
        'id' => 5,
        'titulo' => 'Miedo',
        'director' => 'Pepe Parrilla',
        'sinapsis' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    ]
];

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/cortos', function () use ($cortos) {
    return view('cortos.index', ['cortos' => $cortos]);
})->name('cortos.index');

Route::get('/cortos/{id}', function ($id) use ($cortos) {
    $corto = collect($cortos)->firstWhere('id', $id);
    return view('cortos.show', ['corto' => $corto]);
})->name('cortos.show');



