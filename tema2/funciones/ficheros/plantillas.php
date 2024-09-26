<?php

$fp = fopen("plantillas.csv", "r");


while (!feof($fp)){
    $linea = fgets($fp);
    $lista[] = explode(',', $linea);
}
print_r($lista);

$header = array_shift($lista);
foreach ($lista as $ls){
    $tabla[] = array_combine($header, $ls);
}


fclose($fp);

foreach ($tabla as $jugador) {

    if ($jugador['equipo']=="Atlético de Madrid"){
    
    echo "<tr>";
    echo "<td>{$jugador['Dorsal']}</td>";
    echo "<td>{$jugador['Nombre']}</td>";
    echo "<td>{$jugador['Apellidos']}</td>";
    echo "<td>{$jugador['Posicion']}</td>";
    echo "<td>{$jugador['Equipo']}</td>";

    echo "</tr>";
    }
}


?>
