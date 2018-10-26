<?php

class TunnelModel {

    private $pdo;

    public function __construct() {
        $this->pdo = SPDO::getInstance()->getDb();
    }

    public function selects(int $id = null) {
        try {
            if($id === null) {
                if( ( $statement = $this->pdo->query( 'SELECT `t_id` AS `id`, `t_progres` AS `progres`, `t_villedepart_fk` AS `villedepart_fk`, `t_villearrivee_fk` AS `villearrivee_fk` FROM `tunnel`
            ' ) )!==false ) {
                    $Tunnels = array();
                    foreach( $statement->fetchAll( PDO::FETCH_ASSOC ) as $TunnelDatas ) {
                        $Tunnels[] = new Tunnel( $TunnelDatas );
                    }

                return $Tunnels;
            }
            return false;
            } else {
                if(($statement = $this->pdo->prepare('SELECT `t_id` AS `id`, `t_progres` AS `progres`, `t_villedepart_fk` AS `villedepart_fk`, `t_villearrivee_fk` AS `villearrivee_fk` FROM `tunnel` WHERE `t_id`=?'))!==false) {
                    if($statement->bindValue(1, $id)) {
                        if($statement->execute()) {
                            $res = new Tunnel ($statement->fetch(PDO::FETCH_ASSOC));
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