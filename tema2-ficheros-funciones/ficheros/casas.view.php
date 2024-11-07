
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr><th>Nombre</th><th>Id</th><th>Localidad</th><th>Teléfono</th></tr>";

    foreach ($tabla as $casas) {

    if (!empty($casas['telefono'])){
    
    echo "<tr>";
    echo "<td>{$casas['nombre']}</td>";
    echo "<td>{$casas['id']}</td>";
    echo "<td>{$casas['localidad']}</td>";
    echo "<td>{$casas['telefono']}</td>";

    echo "</tr>";
    }
}

        echo "</table>";

    ?>
    
</body>
</html>

