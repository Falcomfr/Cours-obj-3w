<?php

$sum = 0;

do {
    echo "Nombre d'élèves (max. 100) ?";
    $nbStudents = readline();
} while($nbStudents < 0 && $nbStudents >= 100);

for($i = 1; $i <= $nbStudents; $i++) {
    echo "Saisissez une note :";
    $score[$i] = readline();
    $sum = $sum + $score[$i];
}

echo "Moyenne des notes :". ( $sum / $nbStudents );

for($i = 1; $i <= $nbStudents; $i++) {
    echo "Note n°". $i .":". $score[$i];
}