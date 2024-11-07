<?php
    $filas = 6;
    $columnas = 9;

    $numeros = array();

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            do {
                $numeroAleatorio = rand(100, 999);
            } while (in_array($numeroAleatorio, $numeros));
            $matriz[$i][$j] = $numeroAleatorio;
            $numeros[] = $numeroAleatorio;
        }
    }

    
    $filaMin = 0;
    $colMax = 0;

    for ($i = 0; $i < $filas; $i++) {
        for ($j = 0; $j < $columnas; $j++) {
            if ($matriz[$i][$j] > 999) {
                $colMax = $j; 
            }
            if ($matriz[$i][$j] < 100) {
                $filaMin = $i; 
            }
        }
    }

    echo "<table>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            if ($i == $filaMin) {
                echo "<td style='color: green'>" . $matriz[$i][$j] . "</td>";
            }
            elseif ($j == $colMax) {
                echo "<td style='color: blue'>" . $matriz[$i][$j] . "</td>";
            }
            else{
            echo "<td>" . $matriz[$i][$j] . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
