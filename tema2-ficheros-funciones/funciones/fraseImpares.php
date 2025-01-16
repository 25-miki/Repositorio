<?php

function fraseImpar($a){
    $frase = (string)$a; 
    $frasefin = ''; 

    for($i = 1; $i < strlen($frase); $i += 2){ 
        $frasefin .= $frase[$i]; 
    }

    return $frasefin; 
}

$result = fraseImpar("holaquetal");
echo $result; 
?>
