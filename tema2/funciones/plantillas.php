<?php

$archivo = 'plantillas.csv';

if (($gestor = fopen($archivo, 'r')) !== FALSE) {
    $cabecera = fgetcsv($gestor);
    
    $atleticoMadrid = [];

    while (($datos = fgetcsv($gestor)) !== FALSE) {
        if ($datos[1] === 'Atlético de Madrid') {
            $atleticoMadrid[] = [
                'Dorsal' => $datos[11],
                'Nombre' => $datos[4],
                'Apellidos' => $datos[5],
                'Posicion' => $datos[10],
                'Equipo' => $datos[1],
            ];
        }
    }

    fclose($gestor);


    echo '<table border="1">';
    echo '<tr><th>Dorsal</th><th>Nombre</th><th>Apellidos</th><th>Posición</th><th>Equipo</th></tr>';
    
    foreach ($atleticoMadrid as $jugador) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($jugador['Dorsal']) . '</td>';
        echo '<td>' . htmlspecialchars($jugador['Nombre']) . '</td>';
        echo '<td>' . htmlspecialchars($jugador['Apellidos']) . '</td>';
        echo '<td>' . htmlspecialchars($jugador['Posicion']) . '</td>';
        echo '<td>' . htmlspecialchars($jugador['Equipo']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No se pudo abrir el archivo CSV.';
}
?>
