<?php
session_start();

if(isset($_SESSION['comptes'])) {
    echo 'Bienvenue <b>'.$_SESSION["comptes"]["prenom"] . ' ' . $_SESSION["comptes"]["nom"] .'</b><br /> Vous êtes <b>' . $_SESSION["comptes"]["role"] .'<b/><br/>';
    echo '<i><a href="login.php?deco">Déconnexion</a></i>'; 

} else {

    echo '<form action="login.php" method="POST">';
        echo 'Login : <input type="text" name="id">';
        echo '<br/>';
        echo 'Mdp : <input type="text" name="mdp">';
        echo '<input type="submit" value="envoyer">';
        echo '<br/>';
    echo '</form>';

}

