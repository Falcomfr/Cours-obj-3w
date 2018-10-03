<?php

function choisir49() {
    
    $loto = array();
    for($cpt = 0; $cpt < 6 ; $cpt++) {
        $okLoto = 1;
        $rdm = rand(1, 49);
            foreach($loto as $lotoTest){
                if($lotoTest == $rdm) {
                    $okLoto = 0;
                    $cpt = $cpt - 1;
                }
            }
        if($okLoto != 0){
            $loto[$cpt] = $rdm;
                echo "Numéro pioché :".$loto[$cpt]."\r\n";
        }
    }
    return $loto;
}

