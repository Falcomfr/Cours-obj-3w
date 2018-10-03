<?php
session_start();

if(isset($_SESSION['log'])) {
    echo 'Deconnexion en cours';
    unset($_SESSION['log']);
}

header('Refresh:1;url= formAdm.php');