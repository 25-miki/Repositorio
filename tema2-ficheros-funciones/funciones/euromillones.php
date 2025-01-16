<?php 

$nombreArchivo = basename(__FILE__); 

include 'loteria.inc'; 

$resultado = numbers(1, 50, 5);
echo implode(", ", $resultado); 

?>

