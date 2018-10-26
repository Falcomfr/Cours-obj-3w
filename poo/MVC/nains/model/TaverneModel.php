<?php

class TaverneModel {

    private $pdo;

    public function __construct() {
        $this->pdo = SPDO::getInstance()->getDb();
    }

    public function selects(int $id = null) {
        try {
            if($id === null) {
                if( ( $statement = $this->pdo->query( 'SELECT `t_id` AS `id`, `t_nom` AS `nom`, `t_chambres` AS `chambres`, `t_blonde` AS `blonde`, `t_brune` AS `brune`, `t_rousse` AS `rousse`, `t_ville_fk` AS `ville` FROM `taverne`' ) )!==false ) {
                    $tavernes = array();

                    foreach( $statement->fetchAll( PDO::FETCH_ASSOC ) as $taverneDatas ) {
                        $tavernes[] = new Taverne( $taverneDatas );
                    }

                    return $tavernes;
                }

                return false;
            } else {
                if(($statement = $this->pdo->prepare('SELECT `t_id` AS `id`, `t_nom` AS `nom`, `t_chambres` AS `chambres`, `t_blonde` AS `blonde`, `t_brune` AS `brune`, `t_rousse` AS `rousse`, `t_ville_fk` AS `ville` FROM `taverne` WHERE `t_id`=?'))!==false) {
                    if($statement->bindValue(1, $id)) {
                        if($statement->execute()) {
                            $res = new Taverne ($statement->fetch(PDO::FETCH_ASSOC));
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