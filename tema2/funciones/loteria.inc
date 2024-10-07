<?php

function generarNumeroAleatorio($min, $max) {
    return rand($min, $max);
}

function seleccionarNumeros($totalNumeros, $maxNumero) {
    $numerosSeleccionados = [];
    while (count($numerosSeleccionados) < $totalNumeros) {
        $numero = generarNumeroAleatorio(1, $maxNumero);
        if (!in_array($numero, $numerosSeleccionados)) {
            $numerosSeleccionados[] = $numero;
        }
    }
    sort($numerosSeleccionados);
    return $numerosSeleccionados;
}
?>
