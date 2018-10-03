<?php

$donnees = array(
    array('lettre' => 'a', 'suivant' => 10),
    array('lettre' => 'e', 'suivant' => -1),
    array('lettre' => 'e', 'suivant' => 6),
    array('lettre' => 'l', 'suivant' => 1),
    array('lettre' => 'p', 'suivant' => 8),
    array('lettre' => 'o', 'suivant' => 11),
    array('lettre' => 'x', 'suivant' => 12),
    array('lettre' => 'p', 'suivant' => 3),
    array('lettre' => 'r', 'suivant' => 5),
    array('lettre' => 'm', 'suivant' => 7),
    array('lettre' => 'b', 'suivant' => 3),
    array('lettre' => 'b', 'suivant' => 0),
    array('lettre' => 'a', 'suivant' => 9)
    );

if(isset($_POST["nb"])){
    if(is_numeric($_POST["nb"])){
        if(ctype_digit($_POST["nb"])){
            if($_POST["nb"] >= 13 || $_POST["nb"] <= -1){
                echo "Aucun résultat";
            } else {
            position($_POST["nb"], $donnees);
            }
        } else {echo "Veuillez entrer un chiffre sans virgule ";}
    } else { echo "Veuillez entrer un chiffre !";}
} else { echo "Formulaire vide !";}

function position($nombre, $tab) {
    echo $tab[$nombre]['lettre'];
    if($tab[$nombre]['suivant'] != -1){
        position($tab[$nombre]['suivant'], $tab);
    }
}

?>

<form action="listeChain.php" method="post">

    <input type="text" name="nb" />
    <input type="submit" value="Envoyer">

</form>



