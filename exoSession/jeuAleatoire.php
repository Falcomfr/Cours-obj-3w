<?php
session_start();

echo '<a href="jeuReset.php?reset">Nouvelle partie !</a> <br/>';

if(!isset($_SESSION['jeuRdm'])){
    $_SESSION['jeuRdm']['nb'] = rand();
}

if(isset($_POST['testNb'])) {
    if(ctype_digit($_POST["testNb"])){
        if($_SESSION['jeuRdm']['nb'] > $_POST['testNb']) {
            $historique = $_POST['testNb'] . "(Trop petit)" . PHP_EOL . $_POST['historique'];
        } elseif ($_SESSION['jeuRdm']['nb'] < $_POST['testNb']) {
            $historique = $_POST['testNb'] . "(Trop grand)" . PHP_EOL . $_POST['historique'];
        } else {
            echo "Vous avez trouvé le bon chiffre ! Nouvelle partie dans 2 secondes !!!";
            header('Refresh:2;url= jeuReset.php');
            exit;
        }
    } else {echo 'Veuillez indiquer des nombres sans virgule';}
}

?>
<form action="jeuAleatoire.php" method="POST">
    <input type="text" name="testNb">
    <input type="submit" value="Tester">
    <br>
    <textarea name="historique" style="width:250px;height:200px;"><?php if( isset( $historique ) ) echo $historique; ?></textarea>
</form>