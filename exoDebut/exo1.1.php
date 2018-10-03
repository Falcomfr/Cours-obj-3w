<?php
echo "Nombre de chiffres a calculer";
$nb = readline();
$calcul = 0;
for($i = 1; $i <= $nb; $i++) {
    $calcul = readline() + $calcul;
}

echo $calcul;