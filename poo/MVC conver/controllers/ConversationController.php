<?php
class ConversationController extends CoreController {
  const MODEL = 'Conversation';

  public function list() {
    $class = static::MODEL;

    $conversations = $this->_model->readAll();

    $this->render('index', ['title'=>static::MODEL, 'conversations'=>$conversations]);
  }

}

