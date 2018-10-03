<?php

$cheminFichier = 'data.txt'; // On définit le chemin vers le fichier.


$i = 0;
$tab = array();
if( file_exists( $cheminFichier ) ) :
    $ressourceFichier = fopen( $cheminFichier, 'r' );
    while( !feof( $ressourceFichier ) ) {
        $line = fgets($ressourceFichier);
        
        if(empty($tab)) {
            $tab[$i] = array();
            $first = $line;
        }

        if($line == "\r\n"){
            $i += 1;     
            $tab[$i] = array();    
  
        } else {
            $tab[$i][] = $line;
        }
    }
    fclose( $ressourceFichier );
endif;
$nbTab = count($tab);
$nbSTab = count($tab[1]);
array_shift($tab[0]);


echo $first;
for($i = 0; $i < $nbSTab ; $i++) {

    for($cpt = 0; $cpt < $nbTab ; $cpt++) {

        if($i==0){shuffle($tab[$cpt]);}


        if( $cpt!==0 || $i!==0 ) {
            if( $cpt===0 && $i===$nbSTab-1 ) {
                echo $tab[0][0];
            }
            if(isset($tab[$cpt][$i])) {
                echo $tab[$cpt][$i];
            }
        }

    }
    echo "\r\n\r\n";
}





