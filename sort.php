<?php

function bubble($arr)
{
    $n = count($arr);
    if ($n <= 1) return $arr;

    for ($i = 0; $i < $n; $i++) {
        $flag = false;
        for ($j = 0; $j < $n - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
                $flag = true;
            }
        }

        if (!$flag) break;
    }

    return $arr;
}

function insert($arr)
{
    $n = count($arr);
    if ($n <= 1) return $arr;

    for ($i = 1; $i < $n; $i++) {
        $value = $arr[$i];
        $j = $i - 1;

        for (; $j > 0; $j--) {
            if ($arr[$j] > $value) {
                $arr[$j + 1] = $arr[$j];
            } else {
                break;
            }
        }

        $arr[$j + 1] = $value;
    }
}

function choose($arr)
{
    $n = count($arr);
    if ($n <= 1) return $arr;

    for ($i = 0; $i < $n; $i++) {
        $min = $j = $i;
        for (; $j < $n; $j++) {
            if ($arr[$j] < $arr[$min]) $min = $j;
        }

        [$arr[$i], $arr[$min]] = [$arr[$min], $arr[$i]];
    }

    return $arr;
}

$arr = [3, 1, 4, 2, 6, 5];
print_r(bubble($arr));
print_r(insert($arr));
print_r(choose($arr));
