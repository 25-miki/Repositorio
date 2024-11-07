<?php
$numeros = [];

while (count($numeros) < 50) {
    $n = rand(0, 99);
    if (!in_array($n, $numeros)) {
        $numeros[] = $n;
    }
}


sort($numeros);
$media = array_sum($numeros)/50;

echo "Media: $media";echo "<br>";

echo "$numeros[0]";echo "<br>";

echo "$numeros[49]";
?>
