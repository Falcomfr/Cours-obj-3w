<?php

function my_autoloader($class) {
    include 'class/' . $class . '.php';
}

spl_autoload_register("my_autoloader");

$pedaler = new Velo;

echo $pedaler->charger();
echo $pedaler->decharger();

$vroum = new Voiture;

echo $vroum->seDeplacer();
echo $vroum->telecommande();

$cam = new CamionBenne();

echo $cam->cle();
echo $cam->charger();