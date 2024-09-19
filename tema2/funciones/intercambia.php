<?php

function intercambia(&$a, &$b){
    $x = $a;
    $a = $b;
    $b = $x;

    echo $a . $b;
}

$a = 10;
$b = 20;
intercambia($a, $b);

?>