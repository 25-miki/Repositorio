<?php

function cuenta($a, $b){
    for ($i = $a; $i <= $b; $i++){
        if($i != $b){
            echo $i . ",";
        }
        else{
            echo $i;
        }
    }
}

cuenta(10,20);

?>