<?php

function multiply($A)
{
    $n = count($A);
    $B = [1];

    for ($i = 1; $i < $n; $i++) {
        $B[$i] = $B[$i - 1] * $A[$i - 1];
    }

    $tmp = 1;
    for ($j = $n - 2; $j >= 0; $j--) {
        $tmp *= $A[$j + 1];
        $B[$j] *= $tmp;
    }
    return $B;
}
