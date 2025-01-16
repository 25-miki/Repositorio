<?php
    //Fichero en el que deseamos guardar el resultado
    $fp = fopen("archivo.txt", "w");
    
    //imagen que queremos leer (hay que tener gd.lib instalada y activa)
    $img = imagecreatefrompng("camara-fotografica.png");    
    //Obtenemos el tamaño 
    $w = imagesx($img); //ancho
    $h = imagesy($img); //alto
 
    for ($y = 0; $y < $h; $y++) {
        for ($x = 0; $x < $w; $x++) {
            $rgb = imagecolorat($img, $x, $y);
    
            // Extraer los valores RGB del píxel
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
    
            // Calcular la luminosidad usando la fórmula ponderada
            $luminosidad = 0.299 * $r + 0.587 * $g + 0.114 * $b;
    
            // Elegir el carácter según la luminosidad
            if ($luminosidad > 230) {
                fwrite($fp, " ");  // Muy claro (casi blanco)
            } elseif ($luminosidad > 200) {
                fwrite($fp, ".");  // Claro
            } elseif ($luminosidad > 170) {
                fwrite($fp, ":");  // Intermedio claro
            } elseif ($luminosidad > 140) {
                fwrite($fp, "-");  // Gris claro
            } elseif ($luminosidad > 110) {
                fwrite($fp, "=");  // Gris medio
            } elseif ($luminosidad > 80) {
                fwrite($fp, "+");  // Gris oscuro
            } elseif ($luminosidad > 50) {
                fwrite($fp, "*");  // Oscuro
            } elseif ($luminosidad > 20) {
                fwrite($fp, "#");  // Muy oscuro
            } else {
                fwrite($fp, "@");  // Casi negro
            }
        }
        fwrite($fp, "\n");  // Nueva línea al final de cada fila
    }


fclose($fp);
echo "El archivo se ha generado correctamente";

?>

