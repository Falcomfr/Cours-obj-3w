<?php
session_start();
unset( $_SESSION['jeuRdm'] );
echo '<h1><b>Nouvelle partie !</b></h1>';
header('Refresh:1;url= jeuAleatoire.php');
exit;