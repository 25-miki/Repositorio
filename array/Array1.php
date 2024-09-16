<?php
$numeros = [];

while (count($numeros) < 50) {
    $n = rand(0, 99);
    if (!in_array($n, $numeros)) {
        $numeros[] = $n;
    }
}

foreach ($numeros as $numero) {
    echo "$numero,";
}

?>
