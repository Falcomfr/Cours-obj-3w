<?php

function carre($chiffre) {
    $resultat = 0;
    $nb = strlen($chiffre);
    for($cpt = 0; $cpt < $nb ; $cpt++) {

        $modulo = ($chiffre % 10);
        $calcul = $modulo * $modulo;
        $chiffre = $chiffre / 10;
        $resultat = $resultat + $calcul;
        
    }
                switch($resultat) {
                    case 0:
                    case 4:
                    case 16:
                    case 37:
                    case 58:
                    case 89:
                    case 145:
                    case 42:
                    case 20: return 0;break;
                    case 1: return 1;break;
                    default: return carre($resultat);
                }
}

$rep = carre(readline());
if($rep == 1){
    echo "Nombre parfait (".$rep.")";
} else {echo "Nombre imparfait (".$rep.")";}