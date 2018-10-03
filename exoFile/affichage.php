<?php
$link = "arborescence_test/";

afficheDossier($link);


// function listeDir($tab){
    
//     $sousTab = array();
//     $nb = count($tab);
    
//     for($i = 0; $i < $nb ; $i++) {
//         $ok=1;
//         if(stripos($tab[$i], "index")){
//             if($tab[$i] != "." && $tab[$i] != "..") {
//                 $sousTab[] = $tab[$i]; 
                
//             }else{$ok=0;}
//         } else{$ok=0;}
//         if(is_dir($tab[$i]) && $ok == 1 ){
//             listeDir(scandir($sousTab[$i]));
//         }
//     }
    
//     return $sousTab;
// }


function afficheDossier($dir) {

    $result = array();

    $cdir = scandir($dir);
    foreach ($cdir as $key => $value)
    {
       if (!in_array($value,array(".","..") ) )
       {
          if (is_dir($dir . DIRECTORY_SEPARATOR . $value) )
          {
             $result[$value] = afficheDossier($dir . DIRECTORY_SEPARATOR . $value);
          }
          else
          {
             $result[] = $value;
          }
       }
    }

    print_r( $result );
 }