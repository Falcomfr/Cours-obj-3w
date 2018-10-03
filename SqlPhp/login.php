<form action="" method="get">
    <input type="text" name="nain" id="">
    <button type="submit">Ok</button>
</form>

<?php
//DSN : Data Source Name
if(isset($_GET['nain'])) {

    $dsn = 'mysql:host=127.0.0.1;dbname=nains;charset=utf8mb4';

    try{
        $db = new PDO($dsn, 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        //$requete = $db->query('SELECT * FROM `nain`');
        if(( $requete = $db->prepare('SELECT * FROM `nain`')) !== false) {

            if($requete->bindValue('nom', $_GET['nain'])) {

                if($requete->execute()) {
                    while( ($reponse = $requete->fetch(PDO::FETCH_ASSOC)) !== false) {
                        var_dump($reponse);
                    }

                    //$reponse = $requete->fetchAll(PDO::FETCH_ASSOC);
                    //var_dump($reponse);
                    $requete->closeCursor();
                } else { die('Problème execution'); }
            } else { die('Problème lors du lien'); }
        } else { die('Problème de preparation'); }
    } catch(PDOException $e) {
        die($e->getMessage());
    }

}