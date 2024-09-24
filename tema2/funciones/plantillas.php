<?php

$fp = fopen("plantillas.csv", "r");


while (!feof($fp)){
    $linea = fgets($fp);
    $lista[] = explode(',', $linea);
}

$header = array_shift($lista);
foreach ($lista as $ls){
    $tabla[] = array_combine($header. $ls);
}

fclose($fp);


include 'plantilla_view.php';


?>
