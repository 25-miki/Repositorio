<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
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
}
