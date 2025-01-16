<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i < 100) {
        echo $i . ", "; 
    } else {
        echo $i . "<br><br>"; 
    }
}
$j = 10;
while ($j >= 0) {
    if ($j > 0) {
        echo $j . " - "; 
    } else {
        echo $j; 
    }
    $j--; 
}
?>
