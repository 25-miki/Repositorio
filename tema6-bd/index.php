<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "database"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Create Task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    $title = $conn->real_escape_string($_POST["title"]);
    $description = $conn->real_escape_string($_POST["description"]);

    $query = $conn->prepare("INSERT INTO task (title, description) VALUES (?, ?)");
    if ($query) {
        $query->bind_param("ss", $title, $description);
        if ($query->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al registrar la tarea: " . $conn->error;
        }
        $query->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Delete Task
if (isset($_GET["delete_id"])) {
    $id = (int) $_GET["delete_id"];
    $query = $conn->prepare("DELETE FROM task WHERE id = ?");
    if ($query) {
        $query->bind_param("i", $id);
        $query->execute();
        $query->close();
        header("Location: index.php");
        exit();
    }
}

// Fetch All Tasks
$query = $conn->prepare("SELECT * FROM task");
if ($query) {
    $query->execute();
    $result = $query->get_result();
    $query->close();
}

// Fetch Task for Editing
$task = null;
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $query = $conn->prepare("SELECT * FROM task WHERE id = ?");
    if ($query) {
        $query->bind_param("i", $id);
        $query->execute();
        $task = $query->get_result()->fetch_assoc();
        $query->close();
    }
}

// Update Task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_task"])) {
    $id = (int) $_POST["id"];
    $title = $conn->real_escape_string($_POST["title"]);
    $description = $conn->real_escape_string($_POST["description"]);

    $query = $conn->prepare("UPDATE task SET title = ?, description = ? WHERE id = ?");
    if ($query) {
        $query->bind_param("ssi", $title, $description, $id);
        if ($query->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error al actualizar la tarea: " . $conn->error;
        }
        $query->close();
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
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["title"]); ?></td>
                        <td><?php echo htmlspecialchars($row["description"]); ?></td>
                        <td><?php echo htmlspecialchars($row["created_at"]); ?></td>
                        <td>
                            <a href="index.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?delete_id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
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
