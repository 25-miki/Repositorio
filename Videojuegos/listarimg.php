<?php
include_once("../header.php");
include_once("auth.php");
?>

<div class="row">
    <div class="col-sm-8"><h2>Carátulas de VideoJuegos</h2></div>
    <br>
</div>

<?php
require_once "videojuego.php";
$pdo = conectaDb();

$consulta = $pdo->prepare("SELECT * FROM videojuegos");
$consulta->execute();

while($registro = $consulta->fetch()){
    // Asegurarse de que la columna 'imagen' tenga la ruta correcta
    $imagen = $registro['imagen'];
    
    // Mostrar la imagen con un estilo adecuado
    echo "<div><img src='".$imagen."' style='width: auto; height: 200px; margin: 10px' alt='Carátula de videojuego'></div>";
}

$pdo = null;
?>

<br>
<a href="inicio.php" class="btn btn-primary">Volver</a>

