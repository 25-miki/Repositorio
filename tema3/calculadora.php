<?php
    if (isset($_GET['x']) && isset($_GET['y'])) {
        $x = (float)$_GET['x'];
        $y = (float)$_GET['y'];

        echo "<h2>Variable \$_GET:</h2>";
        print_r($_GET);

        $suma = $x + $y;
        $resta = $x - $y;
        $multiplicacion = $x * $y;

        if ($y != 0) {
            $division = $x / $y;
        } else {
            $division = "Error: División por cero";
        }

        echo "<h2>Resultados:</h2>";
        echo "Suma: $x + $y = $suma<br>";
        echo "Resta: $x - $y = $resta<br>";
        echo "Multiplicación: $x * $y = $multiplicacion<br>";
        echo "División: $division<br>";
    } else {
        echo "<h2>No se recibieron datos.</h2>";
    }

    echo "<h2>Valores de la variable \$_SERVER:</h2>";
    print_r($_SERVER);
?>
