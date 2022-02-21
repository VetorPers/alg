<?php

function quickSort($arr)
{
    quickSortHandle($arr, 0, count($arr)-1);
    return $arr;
}

function quickSortHandle(&$arr, $l, $r)
{
    if ($l>=$r) {
        return;
    }
    $p = partition($arr, $l, $r);
    quickSortHandle($arr, $l, $p-1);
    quickSortHandle($arr, $p+1, $r);
}

function partition(&$arr, $l, $r)
{
    $pivot = $arr[$r];
    $i = $l;
    for ($j=$l;$j<$r;$j++) {
        if ($arr[$j]<$pivot) {
            [$arr[$j],$arr[$i]] = [$arr[$i], $arr[$j]];
            $i++;
        }
    }

    [$arr[$r],$arr[$i]] = [$arr[$i], $arr[$r]];

    return $i;
}

print_r(quickSort([3, 2, 4, 1]));
