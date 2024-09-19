<?php
    $coches = array(
        "3333ERT" => array("Honda", "Civic", 5),
        "4444KKK" => array("Chevrolet", "Cavalier", 5),
        "2222RWO" => array("Toyota", "Yaris", 5),
        "1111DUI" => array("Ford", "Fiesta", 5)
    );

    ksort($coches);

    foreach ($coches as $matricula => $datos) {
        echo "<h5>Matrícula: $matricula</h5>";
        echo "<li>Marca: " . $datos[0] . "</li>";
        echo "<li>Modelo: " . $datos[1] . "</li>";
        echo "<li>Número de puertas: " . $datos[2] . "</li>";
    }
    ?>