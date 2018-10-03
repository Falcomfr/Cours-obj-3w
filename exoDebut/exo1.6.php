<?php

do {
    $nb = readline();

    if($nb < 10 OR $nb > 20) {
        if($nb < 10) {
            echo "Nombre trop petit\r\n";
        } else {
        echo "Nombre trop grand\r\n";
        }
    }

} while ($nb < 10 OR $nb > 20);

echo "Bon résultat";