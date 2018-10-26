<?php
function loadController(string $controller) {
  if(file_exists('controllers/' . $controller . '.php')) {
    require_once('controllers/' . $controller . '.php');
  }
}
function loadModel(string $model) {
  if(file_exists('models/' . $model . '.php')) {
    require_once('models/' . $model . '.php');
  }
}
function loadView(string $view) {
  if(file_exists('views/' . $view . '.php')) {
    require_once('views/' . $view . '.php');
  }
}
function loadClass(string $class) {
  if(file_exists('classes/' . $class . '.php')) {
    require_once('classes/' . $class . '.php');
  }
}

spl_autoload_register('loadController');
spl_autoload_register('loadModel');
spl_autoload_register('loadView');
spl_autoload_register('loadClass');