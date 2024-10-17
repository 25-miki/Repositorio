<?php

session_start();

$articulos = array(
    array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
    array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
    array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
    array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
);

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

if (isset($_GET['id'])) {
    $idArticulo = intval($_GET['id']); //intval() es una función en PHP que convierte un valor a un número entero

    foreach ($articulos as $articulo) {
        if ($articulo['id'] == $idArticulo) {
            $_SESSION['carrito'][] = $articulo;
            $_SESSION['total'] += $articulo['precio'];
            break;
        }
    }
}

if (isset($_GET['accion']) && $_GET['accion'] == 'vaciar') {
    $_SESSION['carrito'] = array();
    $_SESSION['total'] = 0;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Carrito de Compras</title>
</head>
<body>
    
<div class="container mt-5">
        <h1 class="text-center mb-4">Carrito de Compras</h1>

        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Lista de artículos</h2>
                <ul class="list-group mb-4">
                    <?php foreach ($articulos as $articulo): ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $articulo['nombre'] ?>
                            <div class="d-flex align-items-center">
                                <span class="me-2"><?= $articulo['precio'] ?> euros</span> 
                                <a href="carro.php?id=<?= $articulo['id'] ?>" class="btn btn-primary btn-sm">Agregar</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>


        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h2>Carrito</h2>
                <?php if (count($_SESSION['carrito']) > 0): ?>
                    <ul class="list-group mb-4">
                        <?php foreach ($_SESSION['carrito'] as $item): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $item['nombre'] ?>
                                <span><?= $item['precio'] ?> euros</span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <p class="text-end"><strong>Total acumulado: <?= $_SESSION['total'] ?> euros</strong></p>
                    <div class="text-end">
                        <a href="carro.php?accion=vaciar" class="btn btn-danger">Vaciar carrito</a>
                    </div>
                <?php else: ?>
                    <p class="alert alert-warning">El carrito está vacío.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>
</html>
