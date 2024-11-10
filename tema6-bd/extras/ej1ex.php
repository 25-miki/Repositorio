<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "extra"; 

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);  
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_user"])) {
    $query = $conn->prepare("INSERT INTO users (nombre, id, email) VALUES (?, ?, ?)"); //Recuerda que "user" da conflicto

    if ($query) {

        $query->bind_param("sis", $_POST["nombre"], $_POST["id"], $_POST["email"]); 
        if ($query->execute()) {
            header("Location: ej1ex.php"); 
            exit();
        } else {
            echo "Error al registrar la tarea" . $query->error;
        }
        
        $query->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

if (isset($_GET["delete_id"])) {
    $id = (int) $_GET["delete_id"];
    $query = $conn->prepare("DELETE FROM users WHERE id = ?");
    if ($query) {
        $query->bind_param("i", $id);
        $query->execute();
        $query->close();
        header("Location: ej1ex.php");
        exit();
    }
}

$query = $conn->prepare("SELECT * FROM users");
if ($query) {
    $query->execute();
    $result = $query->get_result();
    $query->close();
}

$users = null;
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $query = $conn->prepare("SELECT * FROM users WHERE id = ?");

    if ($query) {
        $query->bind_param("i", $id);
        $query->execute();

        $users = $query->get_result()->fetch_assoc();

        $query->close();
    }
} 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_user"])) {
    $query = $conn->prepare("UPDATE users SET nombre = ?, email = ? WHERE id = ?"); 
    
    if ($query) {
        $query->bind_param("ssi", $_POST["nombre"], $_POST["email"], $id);
        
        if ($query->execute()) {
            header("Location: ej1ex.php"); 
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
        <title>CRUD de Usuarios</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body class="bg-light">
        <div class="container mt-5">

            <h2 class="text-center">CRUD de Usuarios</h2>

            <!-- Formulario -->
            <div class="card my-4">
                <div class="card-header">Registrar Usuario</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="id" placeholder="ID"  class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="email" class="form-control">                        </div>
                        <button type="submit" name="add_user" class="btn btn-primary">Registrar</button>
                    </form>
                </div>
            </div>

            <!-- Listado -->

            <h3 class="my-4">Listado de Usuarios</h3>
        
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row["id"]); ?></td>
                            <td><?php echo htmlspecialchars($row["nombre"]); ?></td>
                            <td><?php echo htmlspecialchars($row["email"]); ?></td>
                            <td>
                                <a href="ej1ex.php?id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-warning">Editar</a>
                                <a href="ej1ex.php?delete_id=<?php echo htmlspecialchars($row["id"]); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">No hay tareas registradas.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>


            <!-- Formulario para editar una tarea existente -->

            <?php if ($users): ?>
                <div class="card my-4">
                    <div class="card-header">Editar usuario</div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($users["id"]); ?>">
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($users["nombre"]); ?>" required>
                            </div>
                            <div class="form-group">
                                <textarea name="email" class="form-control"><?php echo htmlspecialchars($users["email"]); ?></textarea>
                            </div>
                            <button type="submit" name="update_user" class="btn btn-success">Actualizar</button>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        

    </body>
</html>