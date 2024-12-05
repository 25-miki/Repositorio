<?php
include_once("../header.php");
include_once("auth.php");
?>
    <div class="row">
        <div class="col-sm-8"><h2>Agregar <b>Videojuego</b></h2>	
	</div>
	<div class="row">
		<form action="insertar.php" method="post">
			<div class="col-md-6">
				<label>Titulo:</label>
				<input type="text" name="titulo" id="titulo" class='form-control' maxlength="100" required >
			</div>
			<div class="col-md-6">
				<label>Genero:</label>
				<input type="text" name="genero" id="genero" class='form-control' maxlength="100" required>
			</div>
			<div class="col-md-3">
				<label>PVP:</label>
				<input type="real"  name="pvp" id="pvp" class='form-control'  required></textarea>
			</div>
			<div class="col-md-9">
				<label>URL de la imagen:</label>
				<input type="text" name="imagen" id="imagen" class='form-control' required>
			</div>
			<div class="col-md-12 pull-right">
			<hr>
				<button type="submit" class="btn btn-success">Guardar datos</button>
			</div>
		</form>
	</div>    
<footer>
	<div class="badge bg-primary text-wrap" style="width: 6rem;">
		This text should wrap.
	</div>
</footer> 

<?php
  include("listar.php");
?>

<a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>

</html>