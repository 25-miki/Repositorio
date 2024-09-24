<?php

$fp = fopen("casas_rurales.csv", "r");

$casas_rurales = [];

while (($fila = fgetcsv($fp, 0, ';')) !== false) { //se tiene que poner así porque este csv utiliza ; en vez de comas
    if (!empty($fila[9])) {
        $casas_rurales[] = [
            'Id' => $fila[0], 
            'Nombre' => $fila[3],
            'Localidad' => $fila[1],
            'Telefono' => $fila[9]
        ];
    }
}
fclose($fp);

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
