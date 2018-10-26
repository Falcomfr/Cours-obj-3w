<?php
class Layout {
  public function wrap($view) {
    ob_start();
    require_once('views/includes/layout.php');
    $layout = ob_get_contents();
    ob_end_clean();

    return $layout;
  }
}