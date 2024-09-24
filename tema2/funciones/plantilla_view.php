<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

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
    
</body>
</html>

