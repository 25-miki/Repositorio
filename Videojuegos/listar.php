<?php
include_once("../header.php");
include_once("auth.php");

?>
  <div class="row">
      <div class="col-sm-9">
        <h2>Listado de VideoJuegos</h2>
        <a href="listarimg.php">
          <img src="svg/img.svg" style="width: 30px; height: 30px; border-radius:5px" alt="Descripción de la imagen">
        </a>
      </div>
  </div>
<?php

  require_once "videojuego.php";
  $pdo=conectaDb();


  $consulta = $pdo->prepare("SELECT * FROM videojuegos ");
  echo "<table class='table'><thead>";
  echo "<tr> <th scope='col'>Nombre</th><th scope='col'>genero</th><th scope='col'>PVP</th><th scope='col'>operaciones</th></tr>";
  echo "</thead><tbody>";
  
    $consulta->execute();

    while($registro = $consulta->fetch())
      {
      
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