<?php

session_start();
//session_destroy();
echo '<form action="index.php" method="post">';
    echo '<textarea name="content" ></textarea> ';

    echo '<select name="tags">';
        echo '<option value="1">Titre 1</option>';
        echo '<option value="2">Titre 2</option>';
        echo '<option value="3">Titre 3</option>';
        echo '<option value="4">Titre 4</option>';

        echo '<option value="5">Paragraphe</option>';

        echo '<option value="6">Texte gras</option>';
        echo '<option value="7">Italique</option>';
        echo '<option value="8">Souligné</option>';

        echo '<option value="9">Citation</option>';
        echo '<option value="10">Date</option>';
        echo '<option value="11">Heure</option>';
        echo '<option value="12">Image</option>';
    echo '</select>';

    echo '<input type="submit" value="Ajouter">';
echo '</form>';


if(isset($_POST['content'], $_POST['tags'])){
    switch ($_POST['tags']) {
        case 1:
            $_SESSION['textHtml']['tagsOpen'][] = "<h1>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</h1>";
            break;
        case 2:
            $_SESSION['textHtml']['tagsOpen'][] = "<h2>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</h2>";
            break;
        case 3:
            $_SESSION['textHtml']['tagsOpen'][] = "<h3>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</h3>"; 
            break;
        case 4:
            $_SESSION['textHtml']['tagsOpen'][] = "<h4>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</h4>";
            break;
        case 5:
            $_SESSION['textHtml']['tagsOpen'][] = "<p>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</p>";
            break;
        case 6:
            $_SESSION['textHtml']['tagsOpen'][] = "<b>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</b>";
            break;
        case 7:
            $_SESSION['textHtml']['tagsOpen'][] = "<i>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</i>";
            break;
        case 8:
            $_SESSION['textHtml']['tagsOpen'][] = "<u>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</u>";
            break;
        case 9:
            $_SESSION['textHtml']['tagsOpen'][] = "<q>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</q>";
            break;
        case 10:
            $_SESSION['textHtml']['tagsOpen'][] = "<span>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</span>";
            break;
        case 11:
            $_SESSION['textHtml']['tagsOpen'][] = "<span>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</span>";
            break;
        case 12:
            $_SESSION['textHtml']['tagsOpen'][] = "<a href='".$_POST['content']."'>";
            $_SESSION['textHtml']['content'][] = $_POST['content'];
            $_SESSION['textHtml']['tagsClose'][] = "</a>";
            break;
    }
} else { echo "1 des champs est vide";}


foreach($_SESSION['textHtml']['content'] as $key => $test){

    ecriture($_SESSION['textHtml']['tagsOpen'][$key], $test, $_SESSION['textHtml']['tagsClose'][$key]);
    
}
    

function ecriture(string $open, string $contenu, string $close){
    $monfichier = fopen('gen.html', 'r+');
    $ligne = fgets($monfichier);
    fputs($monfichier, $open.$contenu.$close);
}