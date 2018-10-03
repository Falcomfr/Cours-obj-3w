<?php
session_start();

// Vérifie que les variables existes
if(isset($_SESSION['loto']['numPioche'])){

    $nbGagnant = 0;
    $gain = 0;

    // Pioche les 3 tickets gagnants
    for($i=1;$i<=3;$i++) 
    { 
        $random = mt_rand(1, 100);
        if(isset($_SESSION['loto']['numGagnant'])) {
            while(in_array($random,$_SESSION['loto']['numGagnant'])) {
                $random = mt_rand(1, 100);
            }
        }
        $_SESSION['loto']['numGagnant'][] = $random;
        
    }

    // Compare les tickets gagnants avec les tickets achetés
    foreach($_SESSION['loto']['numPioche'] as $numG){
        if(isset($_SESSION['loto']['numGagnant'][0]) && $numG == $_SESSION['loto']['numGagnant'][0]){
            echo "Numéro gagnant: " . $_SESSION['loto']['numGagnant'][0] ." vaut 20 euros. <br/>";
            $nbGagnant += 1;
            $gain += 20;
        } elseif(isset($_SESSION['loto']['numGagnant'][1]) && $numG == $_SESSION['loto']['numGagnant'][1]) {
            echo "Numéro gagnant: " . $_SESSION['loto']['numGagnant'][1] ." vaut 50 euros. <br/>";
            $nbGagnant += 1;
            $gain += 50;
        } elseif(isset($_SESSION['loto']['numGagnant'][2]) && $numG == $_SESSION['loto']['numGagnant'][2]) {
            echo "Numéro gagnant: " . $_SESSION['loto']['numGagnant'][2] ." vaut 100 euros. <br/>";
            $nbGagnant += 1;
            $gain += 100;
        }
    
    }

    // Donne le résultat et ajoute les gains au porte monnaie
    if($nbGagnant == 0) {
        echo "Aucun numéro gagnant :(";
        unset($_SESSION['loto']['numGagnant']);
        header('Refresh:1;url= lotoPlus.php?reset');
    exit;
    } else {
        echo $nbGagnant." numéro(s) gagnant(s) ! Vous gagnez ".$gain." euros.";
        $_SESSION['loto']['monnaie'] += $gain;
    }

    unset($_SESSION['loto']['numGagnant']);
    header('Refresh:4;url= lotoPlus.php?reset');
    exit;

} else {
    echo "Vous avez aucun ticket ! Veuillez en acheter..";
    header('Refresh:2;url= lotoPlus.php');
    exit;
}