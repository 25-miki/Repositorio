<?php
function mayor(): int {
    $args = func_get_args();

    if (empty($args)) {
        echo("Se debe proporcionar al menos un número.");
    }

    $mayor = $args[0];

    foreach ($args as $num) {
        if ($num > $mayor) {
            $mayor = $num;
        }
    }

    return $mayor;
}

echo mayor(3, 5, 9, 2, 8); 
?>