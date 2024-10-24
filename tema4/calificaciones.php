<!DOCTYPE html>
<html lang="es">

<head>
    <?php
    include "../header.php";
    ?>
</head>

<body>
    <div style="width: 50vw; padding: 2rem">
        <h2>Calificaciones</h2>
        <form action="calificaciones.php" method="POST" class="container mt-5">
            <label for="nombre">Nombre de alumno</label>
            <input type="text" name="nombre" id="nombre" required>
            <br>
            <label for="first">Nota primer trimestre</label>
            <input type="number" name="first" id="first" required>
            <br>
            <label for="sec">Nota segundo trimestre</label>
            <input type="number" name="sec" id="sec" required>
            <br>
            <label for="third">Nota tercer trimestre</label>
            <input type="number" name="third" id="third" required>
            <br>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>

    <table border="1" style="width: 100%; margin-top: 2rem">
        <tr>
            <th>Nombre</th>
            <th>Nota 1º Trim</th>
            <th>Nota 2º Trim</th>
            <th>Nota 3º Trim</th>
            <th>Media</th>
        </tr>
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

            $_SESSION['notas'][] = [
                'nombre' => $nombre,
                'first' => $first,
                'sec' => $sec,
                'third' => $third
            ];
        }

        foreach ($_SESSION['notas'] as $alumno):
        ?>
            <tr>
                <td><?php echo htmlspecialchars($alumno['nombre']); ?></td>
                <td><?php echo $alumno['first']; ?></td>
                <td><?php echo $alumno['sec']; ?></td>
                <td><?php echo $alumno['third']; ?></td>
                <td><?php echo round(($alumno['first'] + $alumno['sec'] + $alumno['third']) / 3, 1); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
