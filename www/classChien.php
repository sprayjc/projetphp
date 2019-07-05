<?php

class Chien {
    //Attributs
    // Attributs  specifiques aux chiens
    private $id;
    private $nom;
    private $age;
    private $race;
    // Attributs du maitre du chien
    private $nomMaitre;
    private $telephone;

// Constructeur par default

// fonctions
    public function set($name, $value){}
    public function getId(){
        return $this->id;
    
}
    public function getNom(){return $this->nom;}
    public function getAge (){return $this->age;}
    public function getRace(){return $this->race;}
    public function getNomMaitre(){return $this->nomMaitre;}
    public function getTelephone(){return $this->telephone;}
}

?>
