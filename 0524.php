<?php

function jumpFloor($number)
{
    $arr[1] = 1;
    $arr[2] = 2;
    for ($i = 3; $i <= $number; $i++) {
        $arr[$i] = $arr[$i - 1] + $arr[$i - 2];
    }

    return $arr[$number];
}
