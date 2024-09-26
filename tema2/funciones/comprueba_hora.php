<?php

$hora = "20:20:20";

function horaValida($a) {
    $tiempo = explode(":", $a);

    $horas = (int)$tiempo[0];
    $minutos = (int)$tiempo[1];
    $segundos = (int)$tiempo[2];

    if ($horas >= 0 && $horas <= 23 && $minutos >= 0 && $minutos <= 59 && $segundos >= 0 && $segundos <= 59) {
        return "Hora válida: $horas horas, $minutos minutos, $segundos segundos";
    } else {
        return "Hora no válida";
    }
}

print_r(horaValida($hora));


?>