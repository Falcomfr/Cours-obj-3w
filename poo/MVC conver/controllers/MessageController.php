<?php
class MessageController extends CoreController {
  const MODEL = 'Message';

  public function list() {
    $class = static::MODEL;
    if(!isset($_GET['offset'])) {
      $offset = 0;} 
    else {
      $offset = $_GET['offset'];
    }
    if(!isset($_GET['order'])) {
      $order = "m_date";} 
    else {
      $order = $_GET['order'];
    }
    if(isset($_GET['id'])) {
      $id = $_GET['id'];
    } else {
      $id = 0;
    } 

    $message = $this->_model->readMessages($id,$offset ,$order);

    $this->render('index', ['title'=>static::MODEL, 'message'=>$message]);
  }

}
