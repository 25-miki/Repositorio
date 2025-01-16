<?php
include("header.php");
include("login.php")

?>
  <div class="row">
      <div class="col-sm-9">
        <h2>Listado de alumnos</h2>
      </div>
  </div>
<?php

$profesor = $_SESSION['usuario']; // Asumimos que el nombre del profesor está guardado en la sesión


  require_once "config.php";
  $pdo=conectaDb();

  echo "<table class='table'><thead>";
  echo "<tr> <th scope='col'>Nombre</th><th scope='col'>Apellido1</th><th scope='col'>Apellido2</th><th scope='col'>".$profesor."</th>
  <th scope='col'>Operaciones</th></tr>";
  echo "</thead><tbody>";

  if($profesor === "admin"){
    $consulta = $pdo->prepare("SELECT * FROM notas  ");
    $consulta->execute();

    while($registro = $consulta->fetch())
      {
      
      echo "<tr><td>".$registro['nombre']."</td><td>".$registro['apellido1']."</td><td>".$registro['apellido2']."</td>
      <td>".$registro['profesor1']."</td><td>".$registro['profesor2']."</td><td>".$registro['profesor3']."</td><td>".$registro['tutor']."</td>
      <td><a href=formulario.php?id=".$registro['id']."><img src='pencil.svg' width='30' height='30'></a></td>".
      "</tr>";
      }
  echo "</tbody></table>";
  }
  else{
    $consulta = $pdo->prepare("SELECT id, nombre, apellido1, apellido2, $profesor FROM notas  ");
    $consulta->execute();

    while($registro = $consulta->fetch())
      {
      
      echo "<tr><td>".$registro['nombre']."</td><td>".$registro['apellido1']."</td><td>".$registro['apellido2']."</td>
      <td>".$registro[$profesor]."
      <td><a href=formulario.php?id=".$registro['id']."><img src='pencil.svg' width='30' height='30'></a></td>".
      "</tr>";
      }
  }

  echo "</tbody></table>";

    
  $pdo = null;
  ?>
  
  </body>
</html>