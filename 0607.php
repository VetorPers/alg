<?php

function LastRemaining_Solution($n,  $m)
{
    if ($n < 1) return -1;
    if ($n == 1) return 0;
    $x = LastRemaining_Solution($n - 1, $m);
    return ($x + $m) % $n;
}

echo LastRemaining_Solution(5, 3);
