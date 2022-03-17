<?php

function quickSort($a)
{
    handle($a, 0, count($a)-1);
    return $a;
}

function handle(&$a, $l, $r)
{
    if ($l>=$r) {
        return;
    }
    $p = partition($a, $l, $r);
    handle($a, $l, $p-1);
    handle($a, $p+1, $r);
}

function partition(&$a, $l, $r)
{
    $i = $j = $l;
    $pivot = $a[$r];
    for (;$j<$r;$j++) {
        if ($a[$j]<$pivot) {
            [$a[$i],$a[$j]] = [$a[$j], $a[$i]];
            $i++;
        }
    }

    [$a[$i],$a[$r]] = [$a[$r], $a[$i]];
    return $i;
}

$arr = [3, 1, 2, 7, 5];
$arr = quickSort($arr);
print_r($arr);

function binarySearch($arr, $num)
{
    $l = 0;
    $r = count($arr) - 1;

    while ($l<=$r) {
        $m = $l + (($r - $l)>>1);
        if ($arr[$m] > $num) {
            $r = $m - 1;
        } elseif ($arr[$m] < $num) {
            $l = $m + 1;
        } else {
            return $m;
        }
    }

    return false;
}

$arr = [1, 2, 3, 5, 7];
$ret = binarySearch($arr, 3);
echo $ret;
