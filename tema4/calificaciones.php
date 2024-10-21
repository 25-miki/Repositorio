<!DOCTYPE html>
<html lang="es">
<?php
include "./header.php";
?>
<body>
    <div style="width: 50vw; padding: 2rem">
        <h2>Calificaciones</h2>
        <form action="calificaciones.php" method="POST" class="container mt-5">
            <input type="text" name="nombre" >Nombre de alumno</input>
            <input type="number" name="first">Nota primer trimerstre</input>
            <input type="number" name="sec">Nota segundo trimerstre</input>
            <input type="number" name="third">Nota tercer trimerstre</input>
            <button type="submit" class="btn btn-primary">Log in</button>
        </form>
    </div>

    <?php <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Nota 1º trim</th>
            <th>Nota 2º trim</th>
            <th>Nota 3º trim</th>
            <th>Media</th>
        </tr>
        <?php foreach ($notas as $alumno): ?>
            <tr>
                <td><?php echo htmlspecialchars($alumno['nombre']); ?></td>
                <td><?php echo $alumno['first']; ?></td>
                <td><?php echo $alumno['sec']; ?></td>
                <td><?php echo $alumno['third']; ?></td>

                <td><?php echo round(($alumno['first'] +  $alumno['sec'] + $alumno['third']) / 3); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>



?>
</body>

<?php 

session_start();

if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $first = floatval(trim($_POST['first']));
    $sec = floatval(trim($_POST['sec']));
    $third = floatval(trim($_POST['third']));

}

$_SESSION['notas'][] = [
    'nombre' => $nombre,
    'first' => $first,
    'sec' => $sec,
    'third' => $third
];

?>

</html>