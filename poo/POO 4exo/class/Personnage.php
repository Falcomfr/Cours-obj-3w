<?php

class Personnage {

    private $id;
    private $nom;
    private $degats;

    public function __construct($id, $nom, $degats) {
        $this->id = $id;
        $this->nom = $nom;
        $this->degats = $degats;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDegats() {
        return $this->degats;
    }

    public function frapper(Personnage $personnage) {
        if($personnage->nom !== $this->nom) {
            $dmg = mt_rand(0,25);
            if(isset($_SESSION['his'])) {
                $_SESSION['his'][] = $dmg;
            }
            
            $degats = $personnage->degats += $dmg;
            return $degats;
        } else {
            return null;
        }
    }

}