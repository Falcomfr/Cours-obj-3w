<?php

class UserModel {

    private $db;
    private $req;
  
  
    public function __construct() {
      try {
        $this->db = new PDO('mysql:host=localhost;dbname=popo;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      } catch(PDOException $e) {
        throw new Exception($e->getMessage(), $e->getCode(), $e);
      }
    }
  
    public function __destruct() {
        if(!empty($this->req)) {
            $this->req->closeCursor();
        }
    }

    public function create(User $user) {
      try {
        if(($this->req = $this->db->prepare('INSERT INTO `user`(`u_login` as login, `u_prenom` as `lastname`, `u_nom` as `firstname`, `u_date_naissance` as `naissance`, `u_date_inscription`, `u_rang_fk` as `rank`) VALUES (:login, :prenom, :nom, :naissance, :inscription, :rank)'))!==false) {
          if(
            $this->req->bindValue('login', $user->get_login())
            && $this->req->bindValue('prenom', $user->get_prenom())
            && $this->req->bindValue('nom', $user->get_nom())
            && $this->req->bindValue('naissance', $user->get_naissance())
            && $this->req->bindValue('inscription', $user->get_inscription())
            && $this->req->bindValue('rank', $user->get_rank(), PDO::PARAM_INT)
          ) {
            if($this->req->execute()) {
              $id = $this->db->lastInsertId();
              return $id;
            } else {exit;}
          }
        }
  
        return false;
      } catch(PDOException $e) {
      }
    }

}