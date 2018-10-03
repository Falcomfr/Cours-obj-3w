<?php

$article1 = array("foot", "Le joueurs de foot joue avec ses pieds et un ballon rond", "imageJoueurFoot");
$article2 = array("Rugby", "Le joueurs de rugby joue avec ses mains et un ballon ovale", "imageJoueurRugby");
$article3 = array("Basketball", "Le joueurs de basket joue avec ses mains et un ballon rond rebondissant", "imageJoueurBasket");
$article4 = array("Tennis", "Le joueurs de tennis joue avec une raquette et une balle ronde", "imageJoueurTennis");
$article5 = array("Badminton", "Le joueurs de badminton joue avec une raquette et un volant", "imageJoueurBadminton");


// Exo 1
$input = array($article1, $article2, $article3, $article4, $article5);
$rand_keys = array_rand($input, 3);

echo implode(" / ", $input[$rand_keys[0]] ) . "\n";
echo implode(" / ", $input[$rand_keys[1]] ) . "\n";
echo implode(" / ", $input[$rand_keys[2]] ) . "\n\n\n\n\n";

$art1 = $input[$rand_keys[0]];
$art2 = $input[$rand_keys[1]];
$art3 = $input[$rand_keys[2]];

// Exo 2
echo $art1[0] . " / " . $art1[1] . " / " . $art1[2] ."\n";
echo $art2[2] . " / " . $art2[0] . " / " . $art2[1] ."\n";
echo $art3[0] . " / " . $art3[2] . " / " . $art3[1] ."\n\n\n\n\n";

// Exo 3
shuffle($art1);
shuffle($art2);
shuffle($art3);

foreach($art1 as $monContenu1) {
    echo $monContenu1."\n\r\n\r";
}

foreach($art2 as $monContenu2) {
    echo $monContenu2."\n\r\n\r";
}

foreach($art3 as $monContenu3) {
    echo $monContenu3."\n\r\n\r";
}