<?php

$monTableau = array(12, 39, 46, 10, 6, 32);

echo 'Ordre initial du tableau :';

foreach($monTableau as $monContenu) {
    echo $monContenu."\n\r";
}

function triRapide(&$t, $premier, $dernier, $pivot) {
    $gauche = $premier - 1;
    $droite = $dernier + 1;

    if($pivot >= $premier && $pivot <= $dernier) {
        inverser($t[$pivot], $t[$dernier]);
        while($gauche < $droite) {
            do{
                $gauche = $gauche + 1;
            }while($t[$gauche] < $t[$dernier]);

            if($gauche < $droite){
                do{
                    $droite = $droite -1;
                }while($t[$droite] > $t[$dernier]);

                if($t[$gauche] >= $t[$droite]){
                    inverser( $t[$gauche], $t[$droite] );
                }

            } else {
                inverser( $t[$gauche], $t[$dernier] );
            }

        }
        triRapide( $t, $premier, $gauche-1, $gauche-1 );
        triRapide( $t, $droite+1, $dernier, $dernier );
    }

}

function inverser(&$val1, &$val2){
    $tmp = $val1;
    $val1 = $val2;
    $val2 = $tmp;
}

triRapide( $monTableau, 1, 6, 6 );

echo "Ordre final du tableau :";

foreach($monTableau as $monContenu) {
    echo $monContenu."\n\r";
}