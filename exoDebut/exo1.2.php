<?php
echo "Nombre de chiffres a calculer";
$nb = readline();
$calcul = 0;
$i = 0;
while($nb > $i) {
    $i++;
    $calcul = readline() + $calcul;
}

echo $calcul;