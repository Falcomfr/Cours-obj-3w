<?php
session_start();

if($_SESSION['log']['rang'] == 1) {
    if(isset($_POST['pseudo']) && $_POST['pseudo'] != '') {
        if(isset($_POST['password']) && $_POST['password'] != '') {

        $dsn = 'mysql:host=127.0.0.1;dbname=espace_admin;charset=utf8mb4';

        try{
            $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

            if(( $requete = $db->prepare("INSERT INTO `utilisateurs` (`u_id`, `u_pseudo`, `u_mdp`, u_rang_fk) VALUES('',:pseudo, :mdp, :rang) ")) !== false) {

                if($requete->bindValue('pseudo', $_POST['pseudo']) && $requete->bindValue('mdp', $_POST['password']) && $requete->bindValue('rang', $_POST['role']) ) {

                    if($requete->execute()) {
                        echo "ajout réussi <br/><br/>";
                        $requete->closeCursor();
                        header('Refresh:3;url= logAdm.php');
                    } else { die('Problème execution'); }
                } else { die('Problème lors du lien'); }
            } else { die('Problème de preparation'); }
        } catch(PDOException $e) {
            die($e->getMessage());
        }

        } else {
            echo "Mot de passe vide";
        }
    }else {
        echo "Pseudo vide";
        
    }
    header('Refresh:3;url= logAdm.php');
}else{
    echo "Vous devez être admin pour vous connecter ici !";
    header('Refresh:3;url= formAdm.php');
}

