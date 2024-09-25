<?php

$fp = fopen("casas_rurales.csv", "r");

$casas_rurales = [];
$lista = []; 

while (!feof($fp)) {
    $linea = fgets($fp);
    
    if (!empty($linea)) {
        $lista[] = explode(';',$linea); 
    }
}

$header = array_shift($lista);

$tabla = []; 


foreach ($lista as $ls) {
    $tabla[] = array_combine($header, $ls);
}

fclose($fp);

echo "<table>";

foreach ($tabla as $casas) {

    if (!empty($casas['telefono'])){
    
    echo "<tr>";
    echo "<td>{$casas['nombre']}</td>";
    echo "<td>{$casas['id']}</td>";
    echo "<td>{$casas['localidad']}</td>";
    echo "<td>{$casas['telefono']}</td>";

    echo "</tr>";
    }
}

echo "</table>";

?>
