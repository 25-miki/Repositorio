<?php
include("header.php");
include("auth.php");
include("login.php")

?>
    <div class="row">
        <div class="col-sm-8"><h2>Modificar nota</b></h2></div>
    </div>
<?php

require_once "config.php";
$pdo=conectaDb();
$consulta = $pdo->prepare("SELECT $profesor FROM notas where id=:id");
$consulta->bindParam(':id', $_REQUEST['id']);

 
$consulta->execute();
$registro = $consulta->fetch();
    $id=$registro['id'];
    $nota=$registro[$profesor];
   

echo "<div class='row'><form action='editar.php' method='post'>";

echo "<div class='col-md-3'><label>Precio:</label>";
echo "  <input type='number' name=$profesor id=$profesor class='form-control' max-value='10' value=$profesor ></div>";

echo "  <input type='hidden' name='id' id='id' class='form-control' maxlength='100' value=$id >";
echo " <div class='col-md-12 pull-right'><hr><button type='submit' class='btn btn-success'>Guardar datos</button></div></form></div>";



$pdo = null;
?>
