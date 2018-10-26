<?php
require_once('config/db.php');
require_once('autoload.php');

$ctrl = 'ConversationController';
if(!empty($_GET['c'])) {
  $ctrl = ucfirst($_GET['c']) . 'Controller';
}

if(class_exists($ctrl)) {
  $controller = new $ctrl;
} else {
  header('Location:404');
  exit;
}

  $controller->list();
