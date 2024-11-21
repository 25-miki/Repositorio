<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "database";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Falló la conexión: ' . $e->getMessage());
}

// Crear
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    try {
        $query = $conn->prepare("INSERT INTO task (title, description) VALUES (?, ?)");
        $query->execute([$_POST["title"], $_POST["description"]]);
        header("Location: crud.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al registrar la tarea: " . $e->getMessage();
    }
}

// Eliminar
if (isset($_GET["delete_id"])) {
    try {
        $id = (int)$_GET["delete_id"];
        $query = $conn->prepare("DELETE FROM task WHERE id = ?");
        $query->execute([$id]);
        header("Location: crud.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al eliminar la tarea: " . $e->getMessage();
    }
}

// Obtener todas las tareas
try {
    $query = $conn->prepare("SELECT * FROM task");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al obtener las tareas: " . $e->getMessage();
}

// Editar
$task = null;
if (isset($_GET["id"])) {
    try {
        $id = (int)$_GET["id"];
        $query = $conn->prepare("SELECT * FROM task WHERE id = ?");
        $query->execute([$id]);
        $task = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error al obtener la tarea: " . $e->getMessage();
    }
}

// Actualizar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_task"])) {
    try {
        $id = (int)$_POST["id"];
        $query = $conn->prepare("UPDATE task SET title = ?, description = ? WHERE id = ?");
        $query->execute([$_POST["title"], $_POST["description"], $id]);
        header("Location: crud.php");
        exit();
    } catch (PDOException $e) {
        echo "Error al actualizar la tarea: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">CRUD de Tareas</h2>

        <!-- Formulario para registrar una nueva tarea -->
        <div class="card my-4">
            <div class="card-header">Registrar Nueva Tarea</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Título" required>
                    </div>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Descripción"></textarea>
                    </div>
                    <button type="submit" name="add_task" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>

        <!-- Formulario para editar una tarea existente -->
        <?php if ($task): ?>
            <div class="card my-4">
                <div class="card-header">Editar Tarea</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($task["id"]); ?>">
                        
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="<?php echo htmlspecialchars($task["title"]); ?>" required>
                        </div>
                        <div class="form-group">
                            <textarea name="description" class="form-control"><?php echo htmlspecialchars($task["description"]); ?></textarea>
                        </div>
                        <button type="submit" name="update_task" class="btn btn-success">Actualizar</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <!-- Listado de tareas -->
        <h3 class="my-4">Listado de Tareas</h3>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($result) > 0): ?>
            <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
                <td><?php echo htmlspecialchars($row["title"]); ?></td>
                <td><?php echo htmlspecialchars($row["description"]); ?></td>
                <td><?php echo htmlspecialchars($row["created_at"]); ?></td>
                <td>
                    <a href="crud.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="crud.php?delete_id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No hay tareas registradas.</td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>