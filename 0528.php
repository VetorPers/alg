<?php

function half($array, $o)
{
    $low = 0;
    $high = count($array) - 1;
    while ($low <= $high) {
        $mid = $low + (($high - $low) >> 1);
        if ($array[$mid] > $o) {
            $high = $mid - 1;
        } elseif ($array[$mid] < $o) {
            $low = $mid + 1;
        } else {
            return $mid;
        }
    }

    return -1;
}
echo half([1, 3, 5, 7, 9], 7);
