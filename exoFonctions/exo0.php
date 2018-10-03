<?php
echo "Saisir un nombre entier positif";
$n = readline();

function fibo($nombre) {
    $resultat = 0;
    if ($nombre > 0) {
        if($nombre == 1) {
            $resultat = 1;
        } else {
            $resultat = fibo($nombre - 1) + fibo($nombre - 2);
        }

    }
    return $resultat;
}

echo fibo($n);