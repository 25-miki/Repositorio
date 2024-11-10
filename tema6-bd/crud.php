<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "database"; 

//La clase mysqli en PHP es una clase incorporada que permite conectarse y trabajar con bases de datos MySQL
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); //La función die() en PHP se usa para detener 
    //inmediatamente la ejecución del script cuando se alcanza ese punto en el código y permite mostrar un mensaje de error
}

// Create

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_task"])) {
    // Preparar la consulta SQL con marcadores de posición
    $query = $conn->prepare("INSERT INTO task (title, description) VALUES (?, ?)"); 
    //INSERT INTO task (title, description) VALUES (?, ?) es una consulta SQL preparada con dos parámetros (?). 
    //Estos valores se reemplazarán por los valores reales de $_POST["title"] y $_POST["description"]
    
    if ($query) {
        // Enlazar los parámetros con la consulta preparada
        $query->bind_param("ss", $_POST["title"], $_POST["description"]); // "ss" indica dos parámetros string
        
        // Ejecutar la consulta
        if ($query->execute()) {
            // Redirigir si se insertó correctamente
            header("Location: crud.php"); 
            exit();
        } else {
            // Manejar errores de ejecución
            echo "Error al registrar la tarea" . $query->error;
        }
        
        // Cerrar la consulta preparada
        $query->close();
    } else {
        // Manejar errores de preparación
        echo "Error al preparar la consulta: " . $conn->error;
    }
}


// Delete Task

if (isset($_GET["delete_id"])) {
    $id = (int) $_GET["delete_id"];
    $query = $conn->prepare("DELETE FROM task WHERE id = ?");
    if ($query) {
        $query->bind_param("i", $id); //"i" significa integer
        $query->execute();
        $query->close();
        header("Location: crud.php");
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

// Editing

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
} //Guarda el resultado en la variable task para crear un segundo formulario de edición con los datos ya incluidos


// Update Task

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_task"])) {
    $query = $conn->prepare("UPDATE task SET title = ?, description = ? WHERE id = ?"); 
    //Recuerda aquí ACTUALIZAR, no insertar
    
    if ($query) {
        $query->bind_param("ssi", $_POST["title"], $_POST["description"], $id);
        
        if ($query->execute()) {
            header("Location: crud.php"); 
            exit();
        } else {
            echo "Error al registrar la tarea" . $query->error;
        }
        
        $query->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
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
                            <a href="crud.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="crud.php?delete_id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
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
