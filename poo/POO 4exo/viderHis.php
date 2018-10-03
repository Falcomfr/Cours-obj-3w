<?php
session_start();
unset($_SESSION['his']);
header('Location: index.php');