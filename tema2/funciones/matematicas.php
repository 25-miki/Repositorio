<?php

function digitos(int $num): int {
    $num = abs($num);

    return strlen((string)$num);
}

echo digitos(325425);

function digitoN(int $num, int $pos): int {
    $num = abs($num);
    $strnum = (string)$num;

    return (int)$strnum[$pos];
}

echo digitoN(5742548, 4);


function quitaPorDetras(int $num, int $cant): int {
    $num = abs($num);
    $strnum = (string)$num;

    $numfinal = substr_replace($strnum, 0, -$cant);

    return (int)$numfinal;
}

echo quitaPorDetras(543276, 2);


function quitaPorDelante(int $num, int $cant): int {
    $num = abs($num);
    $strnum = (string)$num;

    $numfinal = substr($strnum, $cant);

    return (int)$numfinal;
}

echo quitaPorDelante(53274, 2);




?>