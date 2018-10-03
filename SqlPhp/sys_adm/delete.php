<?php

session_start();

if($_SESSION['log']['rang'] == 1 && isset($_GET['id'])) {

    $dsn = 'mysql:host=127.0.0.1;dbname=espace_admin;charset=utf8mb4';

    try{
        $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        if(( $requete = $db->prepare("DELETE FROM `utilisateurs` WHERE u_id = :id ")) !== false) {

            if($requete->bindValue('id', $_GET['id']) ) {

                if($requete->execute()) {
                    echo "Suppresion réussi <br/><br/>";
                    $requete->closeCursor();
                    header('Refresh:3;url= logAdm.php');
                } else { die('Problème execution'); }
            } else { die('Problème lors du lien'); }
        } else { die('Problème de preparation'); }
    } catch(PDOException $e) {
        die($e->getMessage());
    }

}else{
    echo "Vous devez être admin pour vous connecter ici !";
    header('Refresh:3;url= formAdm.php');
}

