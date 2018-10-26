<?php
class CoreController {
  protected $_model;
  protected $_view;
  
  public function __construct() {
    $model = static::MODEL . 'Model';
    $this->_model = new $model(DB_ENGINE, DB_HOST, DB_NAME, DB_USER, DB_PWD, DB_CHARSET, DB_COLLATE);
  }

  public function render($view, $vars = []) {
    $this->_view = new CoreView(substr(get_class($this), 0, strlen('Controller')*(-1)), $view, $vars);
    echo $this->_view->render();
  }
}