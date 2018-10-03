<?php

$note = readline();
if($note > 12) {
    echo "Assez bien";
} elseif ($note <= 12 && $note >=10) {
    echo "Passable";
} else {
    echo "Insuffisant";
}