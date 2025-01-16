<?php

$nota1 = rand(0,10);
$nota2 = rand(0,10);

if($nota1 > $nota2){
    echo "Nota1: $nota1 es mayor a nota2: $nota2";
}elseif ($nota1 < $nota2) {
    echo "Nota1: $nota1 es menor a nota2: $nota2";

} else {
    echo "Las notas son iguales ($nota1, $nota2)";

}

?>