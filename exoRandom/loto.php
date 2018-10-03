<?php
$monnaie = 100;
echo "Vous avez 100 euros\r\n\r\n";
do{
echo "Vous avez acheté une grille a 2 euros !\r\n";
$monnaie = $monnaie - 2 ;
echo "Il vous reste : $monnaie euros \r\n\r\n";
echo "Veuillez choisir 6 chiffres\r\n";
$tab = array();

for($i = 0; $i < 6 ; $i++) {
    $ok = 1;
    $tmp = readline();
    if ($tmp > 49 ) {
        echo "Chiffre trop grand 49 maximum\r\n";
        $ok = 0;
    } if ($tmp < 1 OR  $tmp == 0) {
        echo "Chiffre trop petit 1 minimum\r\n";
        $ok = 0;
    }
    foreach($tab as $tabInt){
        if($tabInt == $tmp) {
            echo "Chiffre déjà choisie veuillez en choisir un autre\r\n";
            $ok = 0;
        }
    } 
    if($ok == 1) {
        $tab[$i] = $tmp;
    } else {$i = $i - 1;}
}

include_once ('func_rdm.php');

$rep = choisir49();

$result = array_intersect($rep, $tab);
echo "\r\n";
foreach($result as $numGagnant) {
    if(!isset($numgagnant)){
        echo "Numéro gagnant :".$numGagnant."\r\n";
    }
}
echo "\r\n";
switch(count($result)) {
    case 2: $monnaie = $monnaie + 2;echo "Vous avez gagné 2 euros !\r\n\r\n"; break;
    case 3: $monnaie = $monnaie + 4;echo "Vous avez gagné 4 euros !\r\n\r\n"; break;
    case 4: $monnaie = $monnaie + 8;echo "Vous avez gagné 8 euros !\r\n\r\n"; break;
    case 5: $monnaie = $monnaie + 15;echo "Vous avez gagné 15 euros !\r\n\r\n"; break;
    case 6: $monnaie = $monnaie + 20;echo "Vous avez gagné 20 euros !\r\n\r\n"; break;
    default: echo "Vous avez rien gagné\r\n\r\n";break;
}


}
while($monnaie > 0);
echo "Vous avez plus d'argent :(";