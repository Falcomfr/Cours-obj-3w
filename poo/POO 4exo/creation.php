<?php
session_start();
function loadClass(string $className) {
    require_once('Class/' . $className . '.php');
  }
  spl_autoload_register('loadClass');

if(!empty($_POST['addPersonnage']) ) {
    $personnageModel = new PersonnageModel;
    $perso = $personnageModel->read($_POST['addPersonnage']);
   if($perso){
        $_SESSION['log']['nom'] = $perso['nom'];
        $_SESSION['log']['id'] = $perso['id'];
        $_SESSION['log']['degats'] = $perso['degats'];
   } else {
        $perso = $personnageModel->create($_POST['addPersonnage']);
        $_SESSION['log']['nom'] = $perso->getNom();
        $_SESSION['log']['id'] = $perso->getId();
        $_SESSION['log']['degats'] = $perso->getDegats();
    }  
}

header('Location: index.php');