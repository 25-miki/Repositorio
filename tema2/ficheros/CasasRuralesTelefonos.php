<?php

$fp = fopen("casas_rurales.csv", "r");

$casas_rurales = [];
$lista = []; 

while (!feof($fp)) {
    $linea = fgets($fp);
    
    if (!empty($linea)) {
        $lista[] = explode(';',$linea); 
    }
}

$header = array_shift($lista);

$tabla = []; 


foreach ($lista as $ls) {
    $tabla[] = array_combine($header, $ls);
}

fclose($fp);



?>
<?php include "casas.view.php"; ?>
