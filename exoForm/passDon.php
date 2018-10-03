<?php

$nombre1 = 0;
$operateur = 0;
$nombre2 = 0;
$ok = 1;
$selec1 = "";
$selec2 = "";
$selec3 = "";
$selec4 = "";
$affich = "";
$savv = "";
$sav = "";
if(isset($_POST["nb1"])) {
    $nombre1 = str_replace(",", ".",$_POST["nb1"]);
    if(!is_numeric($nombre1)) {$ok = 2;}
} 
if(isset($_POST["nb2"])) {
    $nombre2 = str_replace(",", ".", $_POST["nb2"]);
    if(!is_numeric($nombre2)) {$ok = 2;}
    elseif ($nombre2 == 0) {
        $ok = 0;
    }
}

if(isset($_POST["operateur"])) {
    $operateur = $_POST["operateur"];
}

if((isset($_POST["nb1"]) && !is_numeric($nombre1)) || (isset($_POST["nb2"]) &&  !is_numeric($nombre2)) || (isset($_POST["operateur"]) && !is_numeric($_POST["operateur"]))) {
    
    switch($operateur) {
        case '+' : $selec1 = "selected";$affich = $_POST["nb1"] + $_POST["nb2"];break;
        case '-' : $selec2 = "selected";$affich = $_POST["nb1"] - $_POST["nb2"];break;
        case '*' : $selec3 = "selected";$affich = $_POST["nb1"] * $_POST["nb2"];break;
        case '/' : $selec4 = "selected";$affich = $_POST["nb1"] / $_POST["nb2"];break;
    }
    $sav = $nombre1 . " " . $operateur . " " . $nombre2 . " = " . $affich;
}

eval('echo '.$nombre1.$operateur.$nombre2.';');

?>
<form action="passDon.php" method="post" style="float:left;">

    <input type="text" name="nb1" value="<?php echo $nombre1 ?>" />
<?php
    echo '<select name="operateur" id="operateur">';
        echo '<option value="+" '.$selec1.'>+</option>';
        echo '<option value="-" '.$selec2.'>-</option>';
        echo '<option value="*" '.$selec3.'>*</option>';
        echo '<option value="/" '.$selec4.'>/</option>';
    echo '</select>';

    echo ' <input type="text" name="nb2" value="'.$nombre2 .'"/>';
    if(isset($_POST["nb1"]) || isset($_POST["nb2"]) || isset($_POST["operateur"])) {
        if(isset($_POST["sauv"])){
            $sav = $sav . '<br/>' .  $_POST["sauv"]; 
        }
        echo '<input type="hidden" name="sauv" value="'.$sav.'" />';
    }
    echo '<input type="submit" value="=">';
echo '</form> &nbsp;';

if($ok == 0 ) {
    echo "Division par 0 impossible !";
} elseif($ok == 2){
    echo "Veuillez entrer un chiffre !";
}else{
    if(isset($_POST["sauv"])) {
        echo "<br/><br/>".$_POST["sauv"];
    } 
}

/* if(!isset($affich)) {
$sauv = $nombre1 . $operateur . $nombre2 . $affich . $sauv;
echo "<br/><br/>".$affich;
} */

