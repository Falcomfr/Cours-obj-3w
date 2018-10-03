<?php

class Velo extends Vehicule implements imateriel
{
    public function charger() {
        echo "je charge <br>";
    }
    public function decharger() {
        echo "je decharge <br>";
    }
}
