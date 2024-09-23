<?php


$fichero = fopen("plantillas.csv");

$fp = fopen("plantillas.csv", "r");
while (!feof($fp, "r")){
    $linea = file($fp);
    $lista[]= explode(",", $linea);
}  
fclose($fp);
$header = array_shift($linea);

echo "<table border = 1px>";
foreach(){
    
}
?>
