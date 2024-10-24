Crea una página llamada clases.php con:
• una clase llamada Persona que tenga como atributos un DNI, un nombre y un email.
– Crea un constructor que permita rellenar esos tres atributos,
– y los getters y setters correspondientes.
– Define también un método Mostrar para sacar por la página los datos de la persona (en un
párrafo, separados por guiones).
– Define adecuadamente la visibilidad (pública o privada) de cada atributo o método.
• Crea una segunda clase llamada Estudiante que:
– herede de Persona, y
– añada un atributo llamado numExpediente.
– Crea su constructor, sus getters y setters y su correspondiente método Mostrar.

<?php

class Persona {
    private $dni = "";
    private $nombre = "";
    private $email = "";
}