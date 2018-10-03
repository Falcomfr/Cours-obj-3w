<?php
session_start();
function loadClass(string $className) {
    require_once('Class/' . $className . '.php');
  }
  spl_autoload_register('loadClass');

if(!empty($_GET['id']) && !empty($_GET['nom']) && isset($_GET['degats']) ) {
    $personnageModel = new PersonnageModel;
    $perso = new Personnage($_GET['id'], $_GET['nom'], $_GET['degats']);
    $moi = new Personnage($_SESSION['log']['id'], $_SESSION['log']['nom'], $_SESSION['log']['degats']);
    
    $hit = $moi->frapper($perso);

    if($hit !== null) {
        if($hit <= 100) {
            $personnageModel->update($_GET['id'], $hit);
        } else {
            $personnageModel->delete($_GET['id']);
            $_SESSION['his'][] = 'mort';
        }
    } 
    header('Location: index.php');
}