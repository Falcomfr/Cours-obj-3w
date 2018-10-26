<?php

class VilleModel {

    private $pdo;

    public function __construct() {
        $this->pdo = SPDO::getInstance()->getDb();
    }

    public function selects(int $id = null) {
        try {
            if($id === null) {
                if( ( $statement = $this->pdo->query( 'SELECT `v_id` AS `id`, `v_nom` AS `nom`, `v_superficie` AS `superficie` FROM `ville`' ) )!==false ) {
                    $villes = array();

                    foreach( $statement->fetchAll( PDO::FETCH_ASSOC ) as $villeDatas ) {
                        $villes[] = new Ville( $villeDatas );
                    }

                    return $villes;
                }

                return false;
            } else {
                if(($statement = $this->pdo->prepare('SELECT `v_id` AS `id`, `v_nom` AS `nom`, `v_superficie` AS `superficie` FROM `ville` WHERE `v_id`=?'))!==false) {
                    if($statement->bindValue(1, $id)) {
                        if($statement->execute()) {
                            $res = new Ville($statement->fetch(PDO::FETCH_ASSOC));
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