<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>CV</h1>
    <?php 
        $estudios_esp = "Estudios: Técnico de anatomía patológica y citología, grado en bellas artes";
        $idiomas_esp = "Idiomas: Español nativo, inglés nivel B2, francés y japonés básico";
        $estudios_eng = "Studies: Technician in Pathological Anatomy and Cytology, Bachelor's Degree in Fine Arts";
        $idiomas_eng = "Languages: Native Spanish, English level B2, basic French and Japanese";
        $estudios_fr = "Études : Technicien en Anatomie Pathologique et Cytologie, Licence en Beaux-Arts";
        $idiomas_fr = "Langues : espagnol natif, anglais niveau B2, japonais et français de base";
        /*Lo siento, no hablo valenciano, soy de Murcia.*/
        /*Escribir el currículum en japonés sería demasiado complicado*/
        
        $idioma = "esp";
    ?>

    <p><?php $estudios = "estudios_" . $idioma;  echo $$estudios; ?><br><?php $idiomas = "idiomas_" . $idioma; echo $$idiomas ?></p>
    <p><?php $idioma = "eng"; $estudios = "estudios_" . $idioma;  echo $$estudios; ?><br><?php $idiomas = "idiomas_" . $idioma; echo $$idiomas ?></p>
    <p><?php $idioma = "fr"; $estudios = "estudios_" . $idioma;  echo $$estudios; ?><br><?php $idiomas = "idiomas_" . $idioma; echo $$idiomas ?></p>

    
</body>
</html>