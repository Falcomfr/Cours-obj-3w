<?php

class MessageModel {

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

    public function readMessages($id, $offset, $order) {
        try {
          switch($order) {
            case 'date':
              $order = 'm_date';
              break;
            case 'nom':
              $order = 'u_nom';
              break;
            default :
              $order = 'm_id';
          }
          if(($this->req = $this->db->prepare('SELECT `m_id`, DATE_FORMAT(`message`.`m_date`,"%d-%m-%Y") as `date`, DATE_FORMAT(`message`.`m_date`,"%H:%i") as `heure`, `u_prenom` as `prenom`, `u_nom` as `nom`, `m_contenu` as `message` FROM `conversation` LEFT JOIN `message` ON `c_id` = `m_conversation_fk` LEFT JOIN `user` ON `message`.`m_auteur_fk` = `user`.`u_id` WHERE `conversation`.`c_id` = ? ORDER BY ' . $order . ' ASC LIMIT 20 OFFSET ?'))!==false) {
            if($this->req->bindValue(1, $id, PDO::PARAM_INT) && $this->req->bindValue(2, $offset, PDO::PARAM_INT)) {
              if($this->req->execute()) {
                while(($datas = $this->req->fetch(PDO::FETCH_ASSOC))!==false) {
                  if($datas['m_id']!==null) {
                    $message[] = new Message($datas);
                  } else {
                    $message = array();
                  }
                }
                return isset($message) ? $message : false;
              }
            }
        
            return false;
          }
        } catch(PDOException $e) {
          throw new Exception($e->getMessage(), 0, $e);
        }
      }

}