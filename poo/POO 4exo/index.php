<?php

session_start();

function loadClass(string $className) {
    require_once('Class/' . $className . '.php');
  }
  spl_autoload_register('loadClass');


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Street fighter</title>
</head>
<body>
<a href="logout.php">logout</a><br>
<?php  
    if(isset($_SESSION['log'])) {
      echo 'Connecté avec <b>' . $_SESSION['log']['nom']. '</b>';
      echo '<br><br>';
    }
?>
Ajouter/selectionner personnage
    <form action="creation.php" method="post">
        <input type="text" name="addPersonnage" id="nom" placeholder="Nom">
        <input type="submit" value="Ajouter">
    </form>

    <br/>Attaquer

    <table><tr>

    <?php 
        $personnageModel = new PersonnageModel;
        $personnages = $personnageModel->readAll();
        foreach ($personnages as $key => $value) {
            echo '<tr><td>' .$value->getNom() . '</td>';
            echo '<td>' .$value->getDegats() . '</td>';
            echo '<td> <a href="attaque.php?id='.$value->getId().'&nom='.$value->getNom().'&degats='.$value->getDegats().'">Attaquer</a> </td></tr>';
        }
    ?>

    </tr></table><br>
    <a href="viderHis.php">Vider l'historique</a><br>
<?php
    if(isset($_SESSION['his'])){
        foreach (array_reverse($_SESSION['his']) as $key => $value) {
            if($value === "mort") {
                echo "Votre adversaire est mort ! <br>";
            } elseif($value === 0) {
                echo "Vous n'avez pas infligé de dommage (looser)<br>";
            }else {
                echo 'Vous avez infligé :' .$value . ' points de dégat <br>';
            }
        }
    }else {
        $_SESSION['his'] = [];
    }
?>

</body>
</html>