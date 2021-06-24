<?php

function    NumberOf1Between1AndN_Solution($n)
{
    $ret = 0;
    $digit = 1;
    $high = (int)($n / 10);
    $cur = $n % 10;
    $low = 0;

    while ($high != 0 || $cur != 0) {
        if ($cur == 0) {
            $ret += $high * $digit;
        } elseif ($cur == 1) {
            $ret += $high * $digit + $low + 1;
        } else {
            $ret += ($high + 1) * $digit;
        }

        $low += $cur * $digit;
        $cur = $high % 10;
        $high = (int)($high / 10);
        $digit *= 10;
    }

    return $ret;
}

NumberOf1Between1AndN_Solution(13);
