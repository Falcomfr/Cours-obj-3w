<?php

    $a = "je suis A";
    $b = "je suis B";
    $c = $a;
    $a = $b;
    $b = $c;

    echo $a;
    echo $b;