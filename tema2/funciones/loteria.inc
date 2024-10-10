<?php

function numbers($min, $max, $n){
    $numeros = [];

    while (count($numeros) < $n) {
        $numero = rand($min, $max);
        
        if (!in_array($numero, $numeros)) {
            $numeros[] = $numero;
        }

    }

    $nombreArchivo = basename(__FILE__);
    if $nombreArchivo == "euromillones.php"{

        while (count($numeros) < 3) {
            $numero = rand(1, 9);
            
            if (!in_array($numero, $numeros)) {
                $numeros[] = $numero;
            }
        }
    }

    return echo $numeros
}
