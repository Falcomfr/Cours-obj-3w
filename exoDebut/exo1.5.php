<?php

$nb1 = readline();
$nb2 = readline();
$calcul = $nb1 * $nb2;
if($calcul > 0) {
    echo "Le produit est positif".$calcul."";
} elseif($calcul < 0) {
    echo "Le produit est négatif".$calcul."";
}
