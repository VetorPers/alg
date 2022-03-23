<?php

$arr = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4];

function de_weight($arr)
{
    $i = 0;
    $j = 1;
    $n = count($arr) - 1;

    for (;$j<=$n;$j++) {
        if ($arr[$j]!==$arr[$i]) {
            $i++;
            $arr[$i] = $arr[$j];
        }
    }

    return array_slice($arr, 0, $i+1);
}
// print_r(de_weight($arr));

$arr = [3, 1, 4, 0];
function missNum($arr)
{
    $n = count($arr);
    $sum1 = (0+$n)*($n+1)/2;

    $sum2 = 0;
    foreach ($arr as $v) {
        $sum2+=$v;
    }

    return $sum1 - $sum2;
}

function missNum2($arr)
{
    $s = microtime(true);
    $n = count($arr);
    $res = $n;

    for ($i=0;$i<$n;$i++) {
        $res += $i - $arr[$i];
    }

    echo microtime(true) - $s;
    return $res;
}

// echo missNum($arr);
// echo missNum2($arr);

$arr = [0, 2, 3, 6];
function twoSum($arr, $target)
{
    $ht = [];

    foreach ($arr as $k=>$v) {
        $o = $target-$v;
        if (isset($ht[$o])) {
            echo $ht[$o],$k;
        } else {
            $ht[$v] = $k;
        }
    }
}

$arr = [0, 2, 3, 5, 6];

function twoSum2($arr, $target)
{
    $i = 0;
    $j = count($arr) - 1;

    while ($i<$j) {
        $s = $arr[$i] + $arr[$j];
        if ($s==$target) {
            return [$i, $j];
        } elseif ($s>$target) {
            $j--;
        } elseif ($s<$target) {
            $i++;
        }
    }

    return null;
}

// print_r(twoSum2($arr, 9));

function primes($n)
{
    $arr = array_fill(0, $n, true);
    for ($i=2;$i*$i<$n;$i++) {
        if ($arr[$i]) {
        }
    }
}

primes(10);
