<?php

function binarySearch($arr, $target)
{
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = $left + ($right - $left) >> 1;
        if ($arr[$mid] > $target) {
            $right = $mid - 1;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } elseif ($arr[$mid] == $target) {
            return $mid;
        }
    }

    return -1;
}

function binarySearchLeft($arr, $target)
{
    $left = 0;
    $right = count($arr) - 1;
    while ($left <= $right) {
        $mid = $left + ($right - $left) >> 1;
        if ($arr[$mid] > $target) {
            $right = $mid - 1;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } elseif ($arr[$mid] == $target) {
            $right = $mid - 1;
        }
    }

    return 1;
    if ($left > 0 && $arr[$left] == $target) {
        return $left;
    }
    return -1;
}

echo binarySearchLeft([1, 2, 5, 7, 8, 10], 2);

// [1,2,2,3,5]; 4
// l:0 r:4 m:2
// l:3 r:4 m:3
// l:4 r:4 m:4 
// r:3 l:4 