<?php

class CamionBenne extends Vehicule implements imateriel
{
    public function cle() {
        echo "J'utilise ma clé <br>";
    }
    public function charger() {
        echo "Je charge <br>";
    }
    public function decharger() {
        echo "Je décharge <br>";
    }
}
