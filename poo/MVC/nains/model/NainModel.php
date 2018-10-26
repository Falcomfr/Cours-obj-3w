<?php

class NainModel {

    private $pdo;

    public function __construct() {
        $this->pdo = SPDO::getInstance()->getDb();
    }

    public function selects(int $id = null) {
        try {
            if($id === null) {
                if( ( $statement = $this->pdo->query( 'SELECT `n_id` AS `id`, `n_nom` AS `nom`, `n_barbe` AS `barbe`, `n_groupe_fk` AS `groupe`, `n_ville_fk` AS `ville` FROM `nain`' ) )!==false ) {
                    $nains = array();

                    foreach( $statement->fetchAll( PDO::FETCH_ASSOC ) as $nainDatas ) {
                        $nains[] = new Nain( $nainDatas );
                    }
                    return $nains;
                }
                return false;
            } else {
                if(($statement = $this->pdo->prepare('SELECT  `n_id` AS `id`, `n_nom` AS `nom`, `n_barbe` AS `barbe`, `n_groupe_fk` AS `groupe`, `n_ville_fk` AS `ville` FROM `nain` WHERE `n_id`=?'))!==false) {
                    if($statement->bindValue(1, $id)) {
                      if($statement->execute()) {
                        $res = new Nain ($statement->fetch(PDO::FETCH_ASSOC));
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


    public function update(int $id) {
        try {
          if(($req = $this->pdo->prepare('UPDATE `nain` SET `n_groupe_fk`=? WHERE `n_id`=?'))!==false) {
            if($req->bindValue(1, $idgroupe) && $req->bindValue(2, $id)) {
              if($req->execute()) {
                $res = $req->rowCount();
                $req->closeCursor();
                return $res;
              }
            }
          }
    
          return false;
        } catch(PDOException $e) {
          throw new Exception('Can not update in the database', 14, $e);
        }
    }

}