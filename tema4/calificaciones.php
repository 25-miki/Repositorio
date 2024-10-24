<!DOCTYPE html>
<html lang="es">
<head>
    <title>Calificaciones</title>
    <?php include "header.php"; ?>
</head>
<body>
    <div style="width: 70vw; padding: 2rem">
        <h2>Calificaciones</h2>
        <form action="calificaciones.php" method="POST" class="container mt-5">
            <input type="text" name="nombre" placeholder="Nombre de alumno" required>
            <input type="number" name="first" placeholder="Nota primer trimestre" required>
            <input type="number" name="sec" placeholder="Nota segundo trimestre" required>
            <input type="number" name="third" placeholder="Nota tercer trimestre" required>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php 
        session_start();

        include "header.php";

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

        if (isset($_GET['accion']) && $_GET['accion'] == 'vaciar') {
            $_SESSION['notas'] = array();
        }

        if (!empty($_SESSION['notas'])): ?>
            <table border="1" style="margin-top: 2rem;">
                <tr>
                    <th>Nombre</th>
                    <th>Nota 1º trim</th>
                    <th>Nota 2º trim</th>
                    <th>Nota 3º trim</th>
                    <th>Media</th>
                </tr>
                <?php foreach ($_SESSION['notas'] as $alumno): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($alumno['nombre']); ?></td>
                        <td><?php echo $alumno['first']; ?></td>
                        <td><?php echo $alumno['sec']; ?></td>
                        <td><?php echo $alumno['third']; ?></td>
                        <td><?php echo round(($alumno['first'] + $alumno['sec'] + $alumno['third']) / 3, 2); ?></td>
                    </tr>
                <?php endforeach; ?>

                


                

            </table>
            <div>
                <a href="calificaciones.php?accion=vaciar" class="btn btn-danger">Borrar</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
