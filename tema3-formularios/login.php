<!DOCTYPE html>
<html lang="es">
<?php
include "header.php";
?>
<body>
    <div style="width: 50vw; padding: 2rem">
        <h2>Identificación</h2>
        <form action="compruebaLogin.php" method="POST"  class="container mt-5">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required class="form-control"><br><br>
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" required class="form-control"><br><br>
            <input type="submit" value="Acceder">
        </form>
        <h2 style="margin-top: 2rem">Registro</h2>
        <form action="compruebaLogin.php" method="POST">
            <label for="nuevo_usuario"  class="form-label">Nuevo Usuario:</label>
            <input type="text" id="nuevo_usuario" name="nuevo_usuario" required class="form-control"><br><br>
            <label for="nueva_password" class="form-label">Nueva Contraseña:</label>
            <input type="password" id="nueva_password" name="nueva_password" required class="form-control"><br><br>
            <input type="submit" value="Agregar Usuario">
        </form>
    </div>
</body>
</html>
