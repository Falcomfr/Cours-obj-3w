<?php
session_start();
//session_destroy();

echo '<form action="listeCourse.php" method="POST">';
    echo '<input type="text" name="articles">';
    echo '<input type="text" name="nb">';
    echo '<input type="submit" value="Ajouter">';
    echo '<br/>';
echo '</form>';
$ok = 1;

if( isset($_POST['articles']) && isset($_POST['nb']) )  {
    if(ctype_digit($_POST['nb'])) {

        foreach($_SESSION['articles'] as $lol){
            if($_SESSION['articles'][$last]['art'] == $_POST['articles']) {
                $_SESSION['articles'][$last]['nb'] = $_SESSION['articles'][$last]['nb'] + $_POST['nb'];
            }else{
                $ok = 0;
            }
        }
        if($ok = 1) {
            $last = count($_SESSION['articles']);
            $_SESSION['articles'][$last]['art'] = $_POST['articles'];
            $_SESSION['articles'][$last]['nb'] = $_POST['nb'];
        }
        // $_SESSION['articles'] = array(
        //     0 => array(
        //         'art'=>$_POST['articles'],
        //         'nb'=>$_POST['nb']
        //     ),
        //     1 => array(
        //         'art'=>$_POST['articles'],
        //         'nb'=>$_POST['nb']
        //     )
        // )
    } else {Echo 'Veuillez entrer un chiffre';}
} 


echo '<table style="border: 1px solid black;">';
    echo '<tr>';
        echo '<td colspan="2" >LISTE DES COURSES</td>';
    echo '</tr>';
    
    echo '<tr>';
        echo '<td>Articles</td>';   
        echo '<td>Quantité</td>';
        echo '<td>Supprimer</td>';  
    echo '</tr>';
if(isset($_SESSION['articles'])) {
    echo '<form action="supprimerCourses.php" method="POST">';


    foreach($_SESSION['articles'] as $key =>$arts){

    echo '<tr>';
            echo '<td style="border: 1px solid black;padding: 5px;">'.$arts['art'].'</td>';
            echo '<td style="border: 1px solid black;padding: 5px;">'.$arts['nb'].'</td>';
            echo '<td style="border: 1px solid black;padding: 5px;"><input type="checkbox" name="delete[]" value="'.$key.'"></td>';
    echo '</tr>';
    }
    echo '<input type="submit" value="Supprimer">';
    echo '</form>';
}
    echo '<tr>';
        echo '<td></td>';
    echo '</tr>';
echo '</table>';

var_dump($_SESSION['articles']);