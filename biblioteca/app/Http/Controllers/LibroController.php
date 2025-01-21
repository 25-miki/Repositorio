<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
    //
    $libros= array(
        array("titulo"=>"El juego de Ender", "autor"=>"Orson Scott
        Card"),
        array("titulo"=>"La tabla de Flandes", "autor"=>"Arturo Pérez
        Reverte"),
        array("titulo"=>"La historia interminable", "autor"=> "Michael
        Ende"),
        array("titulo"=>"El Señor de los Anillos", "autor"=>"J.R.R.
        Tolkien")
    );
    return view('listado', compact('libros'));
    }
    /**
    * Display the specified resource.
    */
    

    public function show($id) {
        return view('libros.show', compact('id'));
    }

    public function create()
    {
    return "Formulario de inserción de libros";
    }
    public function edit()
    {
    return "Formulario de edición de libros";
    }


    public function boot()
    {
        Route::resourceVerbs([
        'create' => 'crear',
        'edit' => 'editar'
        ]);
    }

    
}
