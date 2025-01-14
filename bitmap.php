<?php
    //Fichero en el que deseamos guardar el resultado
    $fp = fopen("archivo.txt");
    
    //imagen que queremos leer (hay que tener gd.lib instalada y activa)
    $img = imagecreatefrompng("Amy_Rose_Advance_3.png");
    
    //Obtenemos el tamaño 
    $w = imagesx($img); //ancho
    $h = imagesy($img); //alto
 
    for($y = 0; $y < $h; $y++) {
        for($x = 0; $x < $w; $x++) {
            $rgb = imagecolorat($img, $x, $y);
            
            //Valor de las componentes RGB de cada pixel
            $r = $rgb >> 16;
            $g = $rgb >> 8 & 255;
            $b = $rgb & 255;

            //Elegir el caracter según la luminosidad del pixel y escribir en el fichero
            
        }
    }

