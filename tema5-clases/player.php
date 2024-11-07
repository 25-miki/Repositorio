<?php

class Player {

    protected $name;
    protected $birthDay;
    protected $country;
    protected $dorsal;
    protected $position;
    protected $goals = 0;
    protected $matches = 0;
    protected $minutes = 0;
    protected $yellowCard = 0;
    protected $redCard = 0;

    public function __construct($name, $birthDay, $country, $dorsal, $position, $goals, $matches, $minutes, $yellowCard, $redCard) {
        
        $this->name = $name;
        $this->birthDay = $birthDay;
        $this->country = $country;
        $this->dorsal = $dorsal;
        $this->position = $position;
        $this->goals = $goals;
        $this->matches = $matches;
        $this->minutes = $minutes;
        $this->yellowCard = $yellowCard;
        $this->redCard = $redCard;

    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }



    public function getBirthDay() {
        return $this->birthDay;
    }

    public function setBirthDay($birthDay) {
        $this->birthDay = $birthDay;
    }



    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }



    public function getDorsal() {
        return $this->dorsal;
    }

    public function setDorsal($dorsal) {
        $this->dorsal = $dorsal;
    }



    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
    }



    public function getGoals() {
        return $this->goals;
    }

    public function setGoals($goals) {
        $this->goals = $goals;
    }



    public function getMatches() {
        return $this->matches;
    }

    public function setMatches($matches) {
        $this->matches = $matches;
    }



    public function getMinutes() {
        return $this->minutes;
    }

    public function setMinutes($minutes) {
        $this->minutes = $minutes;
    }



    public function getYellowCard() {
        return $this->yellowCard;
    }

    public function setYellowCard($yellowCard) {
        $this->yellowCard = $yellowCard;
    }



    public function getRedCard() {
        return $this->redCard;
    }

    public function setRedCard($redCard) {
        $this->redCard = $redCard;
    }


    public function Age(){
        $fechaActual = new DateTime(); 
        $fechaNacimiento = new DateTime($this->birthDay); // Fecha de nacimiento
        $edad = $fechaActual->diff($fechaNacimiento); // Diferencia entre las fechas
        return $edad->y; //edad en años
    }

    public function Score(){
        $this->goals += 1;
    }

    public function addCard(int $Color){
        if ($colour === 1) {
            $this->yellowCard += 1;
        } elseif ($colour === 2) {
            $this->redCard += 1;
        } else {
            echo "Color de tarjeta inválido. Use 1 para amarilla, 2 para roja.";
        }
    }

    public function playMinutes(int $min){
        $this->minutes += $min;
    }

    public function render() {

        echo "Ficha del Jugador:\n";
        echo "-------------------------\n";
        echo "Nombre: " . $this->name . "\n";
        echo "País: " . $this->country . "\n";
        echo "Dorsal: " . $this->dorsal . "\n";
        echo "Posición: " . $this->position . "\n";
        echo "Edad: " . $this->Age() . " años\n";
        echo "Partidos jugados: " . $this->matches . "\n";
        echo "Goles: " . $this->goals . "\n";
        echo "Minutos jugados: " . $this->minutes . "\n";
        echo "Tarjetas amarillas: " . $this->yellowCard . "\n";
        echo "Tarjetas rojas: " . $this->redCard . "\n";

    }


}


class Team {
    private $name;
    private $players = []; 
    private $matches = 0;
    private $won = 0;
    private $lost = 0;
    private $tie = 0;
    private $scoreGoals = 0; 
    private $concededGoals = 0; 

    public function __construct($name, $players, $matches, $won, $lost, $tie, $scoredGoals, $concededGoals) {
        $this->name = $name;
        $this->players = $matches;
        $this->won = $won;
        $this->lost = $lost;
        $this->tie = $tie;
        $this->scoredGoals = $scoredGoals;
        $this->concededGoals = $concededGoals;
    }
}

