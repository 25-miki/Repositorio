
<?php
$estudios_esp = "Soy un modelo de lenguaje desarrollado por OpenAI. Tengo una gran cantidad de conocimientos y puedo ayudarte en una variedad de tareas.”";
$idiomas_esp = "Hablo varios idiomas, incluyendo el español y el inglés.”";
$estudios_val = "Sóc un model de llenguatge desenvolupat per OpenAI. Tinc una gran quantitat de coneixements i puc ajudar-te en una varietat de tasques.”";
$idiomas_val = "Parle diversos idiomes, incloent-hi l’espanyol i l’anglés.”";
$estudios_eng = "I am a language model developed by OpenAI. I have a vast amount of knowledge and can assist you in a variety of tasks.";
$idiomas_eng = "I speak multiple languages, including Spanish and English.";


$idioma = "esp";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["esp"])) 
    $idioma ="esp";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eng"])) $idioma ="eng";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["val"])) $idioma ="val";


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>App idiomas</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    button{
        margin: 0px 10px 10px 0px;
    }
</style>

<body>
    <div class="container">

    <h1>CV</h1>
    
    <form action="appidiomas.php" method="post">
        <button type="submit" name= "eng">Inglés</button><button type="submit" name= "esp">Castellano</button><button type="submit" name= "val">Valenciano</button>
    </form>

    <?php

    $estudios = "estudios_" . $idioma;

    $idiomas = "idiomas_" . $idioma; 
    ?>

    <p><?php echo $$estudios ?></p>
    <p><?php echo $$idiomas ?></p>

    
    </div>

    
</body>
</html>


