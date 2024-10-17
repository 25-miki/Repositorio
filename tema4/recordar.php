<!DOCTYPE html>
<html lang="es">
<?php
include "header.php";
?>
<body>
    <div style="width: 50vw; padding: 2rem">
        <h2>Identificación</h2>
        <form action="remember.php" method="POST" class="container mt-5">
            <label for="usuario" class="form-label">Usuario:</label>
            <input type="text" id="usuario" name="usuario" value="<?php echo isset($_COOKIE['user']) ? $_COOKIE['user'] : ''; ?>" required class="form-control"><br><br>
            
            <label for="password" class="form-label">Contraseña:</label>
            <input type="password" id="password" name="password" value="<?php echo isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; ?>" required class="form-control"><br><br>
 
            <label for="Recordar">Recordar</label>
            <input type="checkbox" id="Recordar" name="Recordar" <?php echo isset($_COOKIE['user']) ? 'checked' : ''; ?>>

            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>
</body>
</html>