<?php
session_start();

foreach($_POST['delete'] as $test){
    echo $_SESSION['articles'][$test];
    echo $_SESSION['nb'][$test] ;
}

