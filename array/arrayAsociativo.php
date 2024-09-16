<?php

$sexo = array();


while (count($sexo) < 101) {
    $n = rand(0, 1);
    if ($n == 0){
        $sexo[] = 'M';
    }
    else {
        $sexo[] = 'F';
    }
}

print_r ($sexo);

?>

