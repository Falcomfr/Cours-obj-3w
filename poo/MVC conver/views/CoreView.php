<?php
class CoreView {
  private $_controller;
  private $_view;
  private $_vars = [];

  public function __construct($class, $view, $vars = []) {
    $this->_controller = $class;
    $this->_view = $view;
    $this->_vars = $vars;
  }

  public function render() {
    $tab = $this->_vars;
    
    ob_start();
    include('views/' . $this->_controller . '/' . $this->_view . '.php');
    $view = ob_get_contents();
    ob_end_clean();

    $layout = new Layout;
    return $layout->wrap($view);
  }
}