<?php

function fblx($n)
{
    if ($n <= 2) return 1;

    $pre = 1;
    $cur = 1;

    for ($i = 3; $i <= $n; $i++) {
        $sum = $pre + $cur;
        $pre = $cur;
        $cur = $sum;
    }

    return $cur;
}

echo fblx(4);
