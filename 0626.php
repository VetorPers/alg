<?php

function generatePoint()
{
    $points = [];
    for ($i = 0; $i < 200; $i++) {
        $points[] = [mt_rand(1, 999), mt_rand(1, 999)];
    }

    return $points;
}

$points = generatePoint();


function distance($pointA, $pointB)
{
    return pow(pow(($pointB[0] - $pointA[0]), 2) + pow(($pointB[1] - $pointA[1]), 2), 1 / 2);
}


function force($points)
{
    $cnt = count($points);
    if ($cnt < 2) return 0;
    $ret = distance($points[0], $points[1]);
    $ti = 0;
    $tj = 1;

    for ($i = 0; $i < $cnt - 1; $i++) {
        for ($j = $i + 1; $j < $cnt; $j++) {
            $dist  = distance($points[$i], $points[$j]);
            if ($dist < $ret) {
                $ret = $dist;
                $ti = $i;
                $tj = $j;
            }
        }
    }

    return [$ret, $points[$ti], $points[$tj]];
}
print_r(force($points));
