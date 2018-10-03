<?php
session_start();
//DSN : Data Source Name
if(!isset($_SESSION['log'])) {
    echo '<b><h2>ESPACE ADMIN</h2></b>';

if(isset($_POST['pseudo']) && $_POST['pseudo'] != '') {
    if(isset($_POST['pass']) && $_POST['pass'] != '') {
    $dsn = 'mysql:host=127.0.0.1;dbname=espace_admin;charset=utf8mb4';

    try{
        $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        if(( $requete = $db->prepare('SELECT * FROM `utilisateurs` JOIN `rang` ON `u_rang_fk` = `r_id` WHERE u_pseudo = :pseudo AND u_mdp = :mdp')) !== false) {

            if($requete->bindValue('pseudo', $_POST['pseudo']) && $requete->bindValue('mdp', $_POST['pass'])) {

                if($requete->execute()) {
                    if (($reponse = $requete->fetch(PDO::FETCH_ASSOC)) !== false) {
                            echo "<div style='color:red'>Connexion réussi</div> <br/><br/>";
                        
                            $_SESSION['log']['pseudo'] = $_POST['pseudo'];
                            $_SESSION['log']['rang'] = $reponse['u_rang_fk'];
                            $_SESSION['log']['rang_nom'] = $reponse['nom'];
                            header('Refresh:1;url= logAdm.php');
                        include('edit_user.php');
                    } else {
                        echo "Utilisateur introuvable";
                        header('Refresh:1;url= formAdm.php');
                    }

                    $requete->closeCursor();
                } else { die('Problème execution'); }
            } else { die('Problème lors du lien'); }
        } else { die('Problème de preparation'); }
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    } else {
        echo "Mot de passe vide";
        header('Refresh:2;url= formAdm.php');
    }
}else {
    echo "Pseudo vide";
    header('Refresh:2;url= formAdm.php');
}

} else {
    echo '<b><h2>ESPACE ADMIN</h2></b>';
    include('edit_user.php');
}