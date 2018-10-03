<?php

class PersonnageModel {
    

  public function __construct() {
    try {
      $this->db = new PDO('mysql:host=localhost;dbname=streetfight;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  public function __destruct() {
    if(!empty($this->req)) {
      $this->req->closeCursor();
    }
  }


  /**
   * Creates a personnage
   *
   * @param Personnage $personnage
   * @return mixed
   */
  public function create(string $personnage) {
    try {
      if(($this->req = $this->db->prepare('INSERT INTO `personnage`(`nom`, `degats`) VALUES (:nom, 0)'))!==false) {
        
        if(
          $this->req->bindValue('nom', $personnage)
        ) {
          if($this->req->execute()) {
            $id = $this->readID($personnage);
            return  new personnage($id ,$personnage, 0);
          }
        }
      }
     
      return false;
    } catch(PDOException $e) {
    }
  }

  public function readAll() {
    try {
      if(($this->req = $this->db->query('SELECT `id` ,`nom`, `degats` FROM `personnage`'))!==false) {
        while(($datas = $this->req->fetch(PDO::FETCH_ASSOC))!==false) {
          $personnage[] = new Personnage( $datas['id'],$datas['nom'], $datas['degats']);
        }
        return $personnage;
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  public function read(string $nom) {
    try {
      if(($this->req = $this->db->prepare('SELECT `id`, `nom`, `degats` FROM `personnage` WHERE `nom`=?'))!==false) {
        if($this->req->bindValue(1, $nom)) {
          if($this->req->execute()) {
            $datas = $this->req->fetch(PDO::FETCH_ASSOC);
            return $datas;
          }
        }
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  public function readID(string $nom) {
    try {
      if(($this->req = $this->db->prepare('SELECT `id`, `nom`, `degats` FROM `personnage` WHERE `nom`=?'))!==false) {
        if($this->req->bindValue(1, $nom)) {
          if($this->req->execute()) {
            $datas = $this->req->fetch(PDO::FETCH_ASSOC);
            return $datas['id'];
          }
        }
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  public function update(int $id, int $degats) {
    try {
      if(($this->req = $this->db->prepare('UPDATE `personnage` SET `degats`=:degats WHERE `id`=:id'))!==false) {
        if(
          $this->req->bindValue('degats', $degats)
          && $this->req->bindValue('id', $id)
        ) {
          $this->req->execute();
        }
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

  public function delete(int $id) {
    try {
      if(($this->req = $this->db->prepare('DELETE FROM `personnage` WHERE `id`=:id'))!==false) {
        if($this->req->bindValue('id', $id, PDO::PARAM_INT)) {
          if($this->req->execute()) {
            return $true;
          }
        }
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }

}