<!-- Crea una página llamada clases.php con:
• una clase llamada Persona que tenga como atributos un DNI, un nombre y un email.
– Crea un constructor que permita rellenar esos tres atributos,
– y los getters y setters correspondientes.
– Define también un método Mostrar para sacar por la página los datos de la persona (en un
párrafo, separados por guiones).
– Define adecuadamente la visibilidad (pública o privada) de cada atributo o método.
• Crea una segunda clase llamada Estudiante que:
– herede de Persona, y
– añada un atributo llamado numExpediente.
– Crea su constructor, sus getters y setters y su correspondiente método Mostrar. -->

<?php

class Persona {

    protected $dni;
    protected $nombre;
    protected $email;

    public function __construct($dni, $nombre, $email) {
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function getDni() {
        return $this->dni;
    }


    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }


    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }


    public function mostrar() {
        echo "<p>{$this->nombre} - {$this->dni} - {$this->email}</p>";
    }
}

class Estudiante extends Persona {

    private $numExpediente;

    public function __construct($dni, $nombre, $email, $numExpediente) {

        parent::__construct($dni, $nombre, $email); 
        $this->numExpediente = $numExpediente;
    }

    public function setNumExpediente($numExpediente) {
        $this->numExpediente = $numExpediente;
    }

    public function getNumExpediente() {
        return $this->numExpediente;
    }


    public function mostrar() {  //sobreescribe 

        echo "<p>{$this->nombre} - {$this->dni} - {$this->email} - Expediente: {$this->numExpediente}</p>";
    }
}

$persona = new Persona("49183750K", "Miki", "patata@algo.com");
$persona->mostrar();

$estudiante = new Estudiante("23052800S", "Raquel", "macarrones@eso.com", "5555555");
$estudiante->mostrar();

?>
