<?php

session_start();
$mensaje = '';

if (isset($_POST['btnSubir'])) {
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {  //UPLOAD_ERR_OK siginifica que no ha habido errores al subir el archivo
       
        $tipoArchivo = $_FILES['imagen']['type'];
        $nombreArchivo = $_FILES['imagen']['name'];
        $rutaTemporal = $_FILES['imagen']['tmp_name'];

        $tiposValidos = ['image/jpeg', 'image/png', 'image/gif'];

        if (in_array($tipoArchivo, $tiposValidos)) {
            $rutaDestino = "uploads/{$nombreArchivo}";

            if (move_uploaded_file($rutaTemporal, $rutaDestino)) {

                $_SESSION['imagen'] = [
                    'ruta' => $rutaDestino,
                    'nombre' => $nombreArchivo,
                    'tipo' => $tipoArchivo,
                    'tamaño' => getimagesize($rutaDestino)
                ];

                header('Location: subirImagen.php?exito=1');
                exit();

            } else {
                $mensaje = "Error al mover el archivo.";
            }

        } else {
            $mensaje = "Por favor, selecciona solo imágenes (JPG, PNG, GIF).";
        }

    } else {
        $mensaje = "Error al subir la imagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Imagen</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Subir Imagen</h1>
        <?php if ($mensaje): ?>
            <div class="alert alert-danger"><?php echo $mensaje; ?></div>
        <?php endif; ?>
        <form enctype="multipart/form-data" action="subirImagen.php" method="POST">
            <div class="form-group">
                <label for="imagen">Selecciona una imagen:</label>
                <input type="file" name="imagen" class="form-control-file" accept="image/*" required>
            </div>
            <button type="submit" name="btnSubir" class="btn btn-primary">Subir</button>
        </form>

        <?php if (isset($_GET['exito']) && $_GET['exito'] == 1): ?>
            <div class="mt-4">
                <h2>Imagen subida con éxito!</h2>
                <img src="<?php echo $_SESSION['imagen']['ruta']; ?>" class="img-fluid" alt="Imagen subida" />
                <p><strong>Nombre:</strong> <?php echo $_SESSION['imagen']['nombre']; ?></p>
                <p><strong>Tipo:</strong> <?php echo $_SESSION['imagen']['tipo']; ?></p>
                <p><strong>Tamaño:</strong> <?php echo $_SESSION['imagen']['tamaño'][0] . 'x' . $_SESSION['imagen']['tamaño'][1] . ' px'; ?></p>
                <p>La imagen se mostrará durante 5 segundos.</p>
                <meta http-equiv="refresh" content="5;url=subirImagen.php">
            </div>
            <?php unset($_SESSION['imagen']); ?>
        <?php endif; ?>
        
        <a href="mostrarImagenes.php" class="btn btn-link">Ver todas las imágenes subidas</a>
    </div>
</body>
</html>
