<?php

require_once "config.php";
$pdo=conectaDb();

$insercion = $pdo->prepare("update notas set $username where id=:id");
$insercion->bindParam(':id', $_REQUEST['id']);
$insercion->bindParam( $profesor, $_REQUEST[$profesor]);




if(!$insercion->execute()) 
echo "<p class=\"aviso\">Error al ejecutar la consulta. SQLSTATE[{$pdo->errorCode()}]: {$pdo->errorInfo()}</p>\n";


$pdo = null;
header("Refresh:1; url=inicio.php");

echo '<p>En breve le redirigiremos al listado.</p>';