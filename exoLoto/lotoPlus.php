<?php
    session_start();

    //Réinitialise la partie
    if(isset($_GET['resetAll'])) {
        echo "La partie va recommencer !";
        session_destroy();
        header('Refresh:1;url= lotoPlus.php');
        exit;
    }else{
        // Réinitialise les tickets disponible et achetés suite à un tirage
        if(isset($_GET['reset'])) {
            $_SESSION['loto']['ticket'] = 0;
            $_SESSION['loto']['nbTicket'] = 100;
            unset($_SESSION['loto']['numPioche']);
            header('Location: lotoPlus.php');
            exit;
        }

        // Vérifie si il reste de l'argent sinon réinitialise la partie
        if(isset($_SESSION['loto']['monnaie']) && $_SESSION['loto']['monnaie'] <= 0 && !isset($_SESSION['loto']['numPioche'])) {
            echo "Vous êtes pauvre vous avez  " .$_SESSION['loto']['monnaie']. " euros et vous avez perdu !! <br/>";
            echo "La partie va recommencer !";
            session_destroy();
            header('Refresh:3;url= lotoPlus.php');
            exit;
        }
        
        //Initialise les sessions, la partie
        if(!isset($_SESSION['loto'])) {
            $_SESSION['loto']['ticket'] = 0;
            $_SESSION['loto']['monnaie'] = 500;
            $_SESSION['loto']['nbTicket'] = 100;
        }
        // Affiche les informations du joueur
        if(isset($_SESSION['loto'])) {
            echo "Nombre de ticket acheté : ".$_SESSION['loto']['ticket'];
            echo " Monnaie : ".$_SESSION['loto']['monnaie'];
            echo " Nombre de ticket restant : ".$_SESSION['loto']['nbTicket']."<br/>";
        }

        // Formulaire d'achat de tickets
        echo 'Choisir un nombre de ticket a acheter (2 euros le ticket):';
            echo '<form action="ticket.php" method="post">
                <input type="text" name="ticket" />
                <input type="submit" value="Acheter">
            </form>';

        // Bouton lancer le tirage
        echo '<a href="tirage.php"><button>Lancer le tirage !</button></a>';

        
        // Affiche les tickets acheté après les avoir trié (enlève la dernière virgule)
        if(isset($_SESSION['loto']['numPioche'])) {

            echo '<p style="border:1px solid black;padding:3px;">';
            sort($_SESSION['loto']['numPioche']);

            $count = count($_SESSION['loto']['numPioche']);
            $i = 0;

            echo 'Numéro(s) pioché(s) : <br/>';
            foreach($_SESSION['loto']['numPioche'] as $numg) {
                $i++;
                echo $numg;
                if($i < $count) {
                    echo ', ';
                }
            }
            echo '</p>';
        }
        
        //Bouton pour relancer la partie
        echo '<a href="lotoPlus.php?resetAll"><button>Relancer la partie</button></a>';
}