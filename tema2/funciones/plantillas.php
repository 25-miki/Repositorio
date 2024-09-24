<?php

$fp = fopen("plantillas.csv", "r");

$jugadores_atletico = [];


while (($fila = fgetcsv($fp)) !== false) {
    if ($fila[1] == "Atlético de Madrid") {
        $jugadores_atletico[] = [
            'Dorsal' => $fila[11],
            'Nombre' => $fila[4],
            'Apellidos' => $fila[5],
            'Posicion' => $fila[10],
            'Equipo' => $fila[1]
        ];
    }
}
fclose($fp);

usort($jugadores_atletico, function($a, $b) {
    return $a['Dorsal'] - $b['Dorsal']; //usort está ordenando el array en función de los 
    //parámetrps que le devuelve la función (si es negativo va antes y si es positivo después)
});

// Imprime la tabla HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Dorsal</th><th>Nombre</th><th>Apellidos</th><th>Posición</th><th>Equipo</th></tr>";

foreach ($jugadores_atletico as $jugador) {
    echo "<tr>";
    echo "<td>{$jugador['Dorsal']}</td>";
    echo "<td>{$jugador['Nombre']}</td>";
    echo "<td>{$jugador['Apellidos']}</td>";
    echo "<td>{$jugador['Posicion']}</td>";
    echo "<td>{$jugador['Equipo']}</td>";
    echo "</tr>";
}

echo "</table>";

?>
