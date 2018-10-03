<?php

echo "Civilité (Mme / Mlle / M / Autre) :";
$civ = readline();

if($civ == "Mme") {
    echo "Madame";
} elseif ($civ == "Mlle") {
    echo "Mademoiselle";
} elseif ($civ == "M") {
    echo "Monsieur";
} else {
    echo "Autre";
}