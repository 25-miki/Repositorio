
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <form action="calculadora.php" method="GET">
        <label for="x">Número 1:</label>
        <input type="number" name="x" required>
        
        <label for="y">Número 2:</label>
        <input type="number" name="y" required>
        
        <button type="submit">Calcula</button>
    </form>
</body>
</html>

<?php
$x = $_GET["X"];
$y = $_GET["Y"];

echo "<h2>Valores de la variable \$_GET:</h2>";
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

?>