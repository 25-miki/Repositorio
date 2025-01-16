<?php 

include 'loteria.inc'; 

$resultado = numbers(1, 50, 5);
echo implode(", ", $resultado); 

?>
