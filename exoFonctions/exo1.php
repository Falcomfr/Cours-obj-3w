<?php
echo "Nombre de lignes";
$nbRows = readline();

echo "Nombre de colonnes";
$nbCols = readline();

function genTD($col) {
    $tmp = "";

    for($cpt = 1; $cpt <= $col; $cpt++) {
        $tmp = $tmp . "\n <td></td>";
    }

    return $tmp;
}

function genTR($row, $col) {
    $tmp = "";

    for($cpt = 1; $cpt <= $col; $cpt++) {
        $tmp = $tmp. "\n <tr>" . genTD($row) . "\n </tr>"; 
    }

    return $tmp;
}

function genTABLE($row, $col) {
    return "<table>\n <tbody>" . genTR($row, $col) . "\n </tbody>\n</table>";
}

echo genTABLE($nbRows, $nbCols);