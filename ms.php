<?php

function mergeSort($arr)
{
    return mergeSortRecursive($arr, 0, count($arr) - 1);
}

function mergeSortRecursive($arr, $l, $r)
{
    if ($l >= $r) return [$arr[$r]];

    $m = intval(($l + $r) >> 1);
    $left = mergeSortRecursive($arr, $l, $m);
    $right = mergeSortRecursive($arr, $m + 1, $r);

    return merge($left, $right);
}

function merge($left, $right)
{
    $i = $j = 0;
    $leftCount = count($left);
    $rightCount = count($right);
    $left[] = pow(2, 12);
    $right[] = pow(2, 12);

    $tmp = [];
    while ($i < $leftCount || $j < $rightCount) {
        if ($left[$i] <= $right[$j]) {
            $tmp[] = $left[$i++];
        } else {
            $tmp[] = $right[$j++];
        }
    }

    return $tmp;
}


$arr = [3, 1, 2, 4, 6, 5, 9, 7, 8];
print_r(mergeSort($arr));
