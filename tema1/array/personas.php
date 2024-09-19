<?php

$personas = array(
    array('nombre' => 'Juan',
    'altura'=> '180',
    'email' => "juan@email.com" ),
    array('nombre' => 'Pedro',
    'altura'=> '170',
    'email' => "pedro@email.com" ),
    array('nombre' => 'Luis',
    'altura'=> '176',
    'email' => "luis@email.com" ),
    array('nombre' => 'Mara',
    'altura'=> '190',
    'email' => "mara@email.com" ),
    array('nombre' => 'Diana',
    'altura'=> '150',
    'email' => "diana@email.com" )
    );

    foreach($personas as $gente){
        echo "<table> <tr>" . "<td>" . $gente['nombre'] . "<td>" . "<td>" . $gente['altura'] . "<td>" . $gente['email'] . "<td>". "<td>". "</tl> </table>";
    }

?>


