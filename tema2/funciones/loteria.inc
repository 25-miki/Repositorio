<?php

function numbers($min, $max, $n){
    global $nombreArchivo;
    $numeros = [];

    while (count($numeros) < $n) {
        $numero = rand($min, $max);
        
        if (!in_array($numero, $numeros)) {
            $numeros[] = $numero;
        }
    }

    if ($nombreArchivo == "euromillones.php") {
        while (count($numeros) < 7) { 
            $numero = rand(1, 9);
            
            if (!in_array($numero, $numeros)) {
                $numeros[] = $numero;
            }
        }
    }

    return $numeros; 
}
