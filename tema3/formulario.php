
<?php
include "header.php";
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pagina = $_POST['pagina'];
    $sexo = $_POST['sexo'];
    $convivientes = $_POST['convivientes'];

    if (!empty($_POST['aficiones'])) {
        $aficiones = implode(", ", $_POST['aficiones']);
    } else {
        $aficiones = "Ninguna afición seleccionada";
    }

    if (!empty($_POST['menu'])) {
        $menu = implode(", ", $_POST['menu']);
    } else {
        $menu = "Ningún menú seleccionado";
    }

    echo '
    <h2>Resumen de Datos</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Campo</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nombre y Apellidos</td>
                <td>' . $nombre . '</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>' . $email . '</td>
            </tr>
            <tr>
                <td>URL Página Personal</td>
                <td>' . $pagina . '</td>
            </tr>
            <tr>
                <td>Sexo</td>
                <td>' . $sexo . '</td>
            </tr>
            <tr>
                <td>Número de Convivientes</td>
                <td>' . $convivientes . '</td>
            </tr>
            <tr>
                <td>Aficiones</td>
                <td>' . $aficiones . '</td>
            </tr>
            <tr>
                <td>Menú Favorito</td>
                <td>' . $menu . '</td>
            </tr>
        </tbody>
    </table>';
}

?>
