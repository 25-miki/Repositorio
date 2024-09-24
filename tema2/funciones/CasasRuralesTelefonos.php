<?php

$fp = fopen("casas_rurales.csv", "r");

$casas_rurales = [];

while (!feof($fp)){
    $linea = fgets($fp);
    $lista[] = explode(';', $linea);
}

$header = array_shift($lista);
foreach ($lista as $ls){
    $tabla[] = array_combine($header. $ls);
}

fclose($fp);


include 'plantilla_view.php';
echo "<table border='1' cellpadding='5' cellspacing='0'>";

foreach ($casas_rurales as $casas) {
    echo "<tr>";
    echo "<td>{$casas['Nombre']}</td>";
    echo "<td>{$casas['Id']}</td>";
    echo "<td>{$casas['Localidad']}</td>";
    echo "<td>{$casas['Telefono']}</td>"; 
    echo "</tr>";
}

echo "</table>";

?>
