<?php

class ConversationModel extends CoreModel {

  public function readAll() {
    try {
      if(($this->req = $this->_db->query('SELECT `c_id`, DATE_FORMAT(`conversation`.`c_date`,"%d-%m-%Y") as `c_date`, DATE_FORMAT(`conversation`.`c_date`,"%H:%i") as `c_heure`, COUNT(DISTINCT `m_id`) as `nbMessages`, `c_termine` FROM `conversation` LEFT JOIN `message` ON `c_id` = `m_conversation_fk` GROUP BY `c_id`'))!==false) {
        while(($datas = $this->req->fetch(PDO::FETCH_ASSOC))!==false) {
          $conversation[] = new Conversation($datas);
        }
        return $conversation;
      }

      return false;
    } catch(PDOException $e) {
      throw new Exception($e->getMessage(), $e->getCode(), $e);
    }
  }


}