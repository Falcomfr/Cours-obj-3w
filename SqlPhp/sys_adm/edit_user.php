

<?php 
if(isset($_SESSION['log'])) {
    echo '<b>';
    echo $_SESSION['log']['pseudo'] .' ';
    echo $_SESSION['log']['rang_nom'] .' ';
    echo '</b>';
    echo "<a href='logout.php'>Se déconnecter</a><br/><br/>";
}

if(($_SESSION['log']['rang'] == 1 || $_SESSION['log']['rang'] == 2) && isset($_GET['edit'])) {

    $dsn = 'mysql:host=127.0.0.1;dbname=espace_admin;charset=utf8mb4';

    try{
        $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

        if(( $requete = $db->prepare("SELECT * FROM `utilisateurs` WHERE u_id = :id_edit ")) !== false) {

            if($requete->bindValue('id_edit', $_GET['edit']) ) {

                if($requete->execute()) {
                    if (($reponse_edit = $requete->fetch(PDO::FETCH_ASSOC)) !== false) {
                        echo '<b>EDITER</b> un utilisateur : <a href="logAdm.php">Annuler l\'édition</a> <br/><br/>';
                        echo '<form action="edit.php?id='.$reponse_edit['u_id'].'" method="post">';
                        echo ' Pseudo <input type="text" name="pseudo" value="'.$reponse_edit['u_pseudo'].'">';
                        echo ' Pass <input type="text" name="password">';
                        $editOk = $reponse_edit['u_rang_fk'];
                        $requete->closeCursor();
                    } else {
                        echo "Utilisateur introuvable";
                    }
                } else { die('Problème execution'); }
            } else { die('Problème lors du lien'); }
        } else { die('Problème de preparation'); }
    } catch(PDOException $e) {
        die($e->getMessage());
    }
} else {
    echo "Ajouter un utilisateur : <br/><br/>";
    echo '<form action="ajout.php" method="post">';
    echo 'Pseudo <input type="text" name="pseudo">';
    echo '<input type="text" name="password">';
 } ?>
    Role 
    <select name="role" >
        <?php 
             $dsn = 'mysql:host=127.0.0.1;dbname=espace_admin;charset=utf8mb4';
             $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            if(( $requete_rang = $db->prepare('SELECT r_id, nom FROM `rang`')) !== false) {

                if($requete_rang->execute()) {
                    while( ( $reponse = $requete_rang->fetch(PDO::FETCH_ASSOC) ) !== false ) {

                        echo '<option value="'.$reponse['r_id'].'"';
                        if(($_SESSION['log']['rang'] == 1 || $_SESSION['log']['rang'] == 2) && isset($_GET['edit']) && isset($editOk)) {
                            if($editOk == $reponse['r_id']) {
                                echo 'selected=selected';
                            }
                        }
                        echo '>'.$reponse['nom'].'</option>';
                        
                    }
                    $requete_rang->closeCursor();
                }
            }
        ?>
    </select>
    <input type="submit" value="ok">
</form>

<?php
if(( $requete_liste = $db->prepare('SELECT * FROM `utilisateurs` JOIN `rang` ON `u_rang_fk` = `r_id` ORDER BY `u_rang_fk`')) !== false) {

    if($requete_liste->execute()) {
        while( ( $reponse = $requete_liste->fetch(PDO::FETCH_ASSOC) ) !== false ) {
            echo $reponse['u_pseudo'] .' '. $reponse['nom'];
            if($_SESSION['log']['rang'] == 1) {
                echo ' <a href="delete.php?id='.$reponse["u_id"].'">Supprimer</a> '; 
            }
            echo ' <a href="logAdm.php?edit='.$reponse['u_id'].'">Editer</a><br/>';
        }
    }
}

?>