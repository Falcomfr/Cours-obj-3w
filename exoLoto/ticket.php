<?php
session_start();

// Vérifie si le chiffre entré est un nombre entier
if(ctype_digit($_POST['ticket'])) {

    // Vérifie si les variables existes
    if(isset($_POST['ticket'], $_SESSION['loto']['nbTicket'])) {

        //Vérifie si il reste assez d'argent dans le porte monnaie
        if(isset($_POST['ticket']) && ($_POST['ticket'] * 2) <= $_SESSION['loto']['monnaie']) {
        
        // Vérifie qu'il reste des tickets à la vente
        if( $_SESSION['loto']['nbTicket'] > 0) {

        // Vérifie qu'il reste suffisament de tickets à la vente
        if($_POST['ticket'] > $_SESSION['loto']['nbTicket']) {
            $ticket = $_SESSION['loto']['nbTicket'] - $_POST['ticket'];
            $ticket = abs($ticket);
            $_POST['ticket'] -= $ticket;
            $_POST['ticket'] = abs($_POST['ticket']);
            echo 'Il ne reste que '.$_SESSION['loto']['nbTicket'].' ticket(s) en vente ! ('.$ticket.' en trop)<br/>';
        }
            
            // Soustrait le nombre de tickets disponible, son cout au porte monnaie et augmente le nombre de tickets acheté
            $_SESSION['loto']['ticket'] += $_POST['ticket'];
            $_SESSION['loto']['monnaie'] -= $_POST['ticket'] * 2;
            $_SESSION['loto']['nbTicket'] -= $_POST['ticket'];
            
            // Pioche des tickets
            for($cpt = 0; $cpt < $_POST['ticket'] ; $cpt++) {
                
                $rand = mt_rand(1, 100);
                if(isset($_SESSION['loto']['numPioche'])) {
                    while(in_array($rand,$_SESSION['loto']['numPioche'])) {
                        $rand = mt_rand(1, 100);
                    }
                } 
                $_SESSION['loto']['numPioche'][] = $rand;
                
            }
            echo $_POST['ticket'].' ticket(s) acheté(s) !';
            header('Refresh:2;url= lotoPlus.php');
            exit;

        } else {
            echo 'Plus de ticket disponible';
            header('Refresh:1;url= lotoPlus.php');
            exit;
        }
        } else {
            echo 'Vous avez pas assez d\'argent !';
            header('Refresh:1;url= lotoPlus.php');
            exit;
        }

    } else {
        echo 'Erreur';
        header('Refresh:1;url= lotoPlus.php');
        exit;
    }

} else {
    echo 'Veuillez entrer un nombre entier';
    header('Refresh:1;url= lotoPlus.php');
    exit;
}