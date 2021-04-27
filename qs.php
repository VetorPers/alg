<?php

function quickSort(&$arr)
{
    quickSortRecursive($arr, 0, count($arr) - 1);
}

function quickSortRecursive(&$arr, $l, $r)
{
    if ($l >= $r) return;

    $m = partition($arr, $l, $r);
    quickSortRecursive($arr, $l, $m - 1);
    quickSortRecursive($arr, $m + 1, $r);
}

function findK(&$arr, $k)
{
    if ($k < 1 || $k > count($arr)) return false;
    return findKRecursive($arr, 0, count($arr) - 1, $k);
}

function findKRecursive(&$arr, $l, $r, $k)
{
    if ($l >= $r) return $arr[$r];

    $m = partition($arr, $l, $r);
    if ($k - 1 > $m) {
        return findKRecursive($arr, $m + 1, $r, $k);
    } elseif ($k - 1 < $m) {
        return  findKRecursive($arr, $l, $m - 1, $k);
    } else {
        return $arr[$m];
    }
}

function partition(&$arr, $l, $r)
{
    $pivot = $arr[$r];
    $count = count($arr);
    $i = $j = $l;

    for (; $j < $count; $j++) {
        if ($arr[$j] < $pivot) {
            [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
            $i++;
        }
    }

    [$arr[$i], $arr[$r]] = [$arr[$r], $arr[$i]];

    return $i;
}

$arr = [3, 1, 2, 5, 8, 6, 7, 4];
// quickSort($arr);
// print_r($arr);

$k = findK($arr, 5);
var_dump($k);
