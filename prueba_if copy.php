<?php

$nota1 = rand(0,10);
$nota2 = rand(0,10);
$nota3 = rand(0,10);


if(($nota1 > $nota2)&&($nota1 > $nota3)){
    echo "Nota1: $nota1 es la mayor";
}elseif (($nota2 > $nota1)&&($nota2 > $nota3)) {
    echo "Nota2: $nota2 es la mayor";
} elseif (($nota3 > $nota1)&&($nota3 > $nota2)){
    echo "Nota3: $nota3 es la mayor";
}  elseif (($nota3 = $nota1)or($nota3 = $nota2)or($nota1 = $nota2)){
    echo "Hay un empate ($nota1, $nota2, $nota3)";
}

?>