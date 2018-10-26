<?php

class GroupeModel {

    private $pdo;

    public function __construct() {
        $this->pdo = SPDO::getInstance()->getDb();
    }

    public function selects(int $id = null) {
        try {
            if($id === null) {
                if( ( $statement = $this->pdo->query( 'SELECT `g_id` AS `id`, `g_debuttravail` AS `debuttravail`, `g_fintravail` AS `fintravail`, `g_taverne_fk` AS `taverne`, `g_tunnel_fk` AS `tunnel` FROM `groupe`
            ' ) )!==false ) {
                    $Groupes = array();
                    foreach( $statement->fetchAll( PDO::FETCH_ASSOC ) as $GroupeDatas ) {
                        $Groupes[] = new Groupe( $GroupeDatas );
                    }

                return $Groupes;
            }
            return false;
            } else {
                if(($statement = $this->pdo->prepare('SELECT `g_id` AS `id`, `g_debuttravail` AS `debuttravail`, `g_fintravail` AS `fintravail`, `g_taverne_fk` AS `taverne`, `g_tunnel_fk` AS `tunnel` FROM `groupe` WHERE `g_id`=?'))!==false) {
                    if($statement->bindValue(1, $id)) {
                        if($statement->execute()) {
                            $res = new Groupe ($statement->fetch(PDO::FETCH_ASSOC));
                            $statement->closeCursor();
                            return $res;
                        }
                    }
                }
                return false;
            }
        } catch( PDOException $e ) {
            die( $e->getMessage() );
        }
    }


}