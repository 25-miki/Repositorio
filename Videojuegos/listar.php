<?php
include_once("../header.php");
include_once("auth.php");

?>
  <div class="row">
      <div class="col-sm-8"><h2>Listado de VideoJuegos</h2></div>
  </div>
<?php

  require_once "videojuego.php";
  $pdo=conectaDb();

  echo "<a href='inicio.php'><img src='svg/arrow-down.svg' width='32' height='32'></a>";

  $consulta = $pdo->prepare("SELECT * FROM videojuegos ");
  echo "<table class='table'><thead>";
  echo "<tr> <th scope='col'>Nombre</th><th scope='col'>genero</th><th scope='col'>PVP</th><th scope='col'>operaciones</th></tr>";
  echo "</thead><tbody>";
  
    $consulta->execute();

    while($registro = $consulta->fetch())
      {
        $titol=$registro['titulo'];
      
      echo "<tr><td>".$registro['titulo']."</td><td>".$registro['genero']."</td><td>".$registro['precio'].
      "</td><td><a href=borrar.php?id=".$registro['id']."><img src='svg/trash-sharp.svg' width='32' height='32'></a>".
      "<a href=formulario.php?id=".$registro['id']."><img src='svg/pencil.svg' width='28' height='28'></a></td>".
      "</tr>";
      }
  echo "</tbody></table>";
  $pdo = null;
  ?>
  
  </body>
</html>