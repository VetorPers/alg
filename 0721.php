<?php

function knapsack($wArr, $n, $w)
{
    for ($i = 0; $i <= $n; $i++) {
        for ($j = 0; $j <= $w + 1; $j++) {
            $stages[$i][$j] = false;
        }
    }

    $stages[0][0] = true;
    if ($wArr[0] <= $w) {
        $stages[0][$wArr[0]] = true;
    }

    for ($i = 1; $i < $n; $i++) {
        for ($j = 0; $j <= $w; $j++) {
            if ($stages[$i - 1][$j] == true) $stages[$i][$j] = $stages[$i - 1][$j];
        }

        for ($j = 0; $j <= $w - $wArr[$i]; $j++) {
            if ($stages[$i - 1][$j] == true) $stages[$i][$j + $wArr[$i]] = true;
        }
    }

    for ($i = $w; $i >= 0; $i--) {
        if ($stages[$n - 1][$i] == true) return $i;
    }

    return 0;
}

function knapsack2($wArr, $n, $w)
{
    for ($i = 0; $i <= $w + 1; $i++) {
        $stages[$i] = false;
    }

    $stages[0] = true;
    if ($wArr[0] <= $w) {
        $stages[$wArr[0]] = true;
    }

    for ($i = 1; $i < $n; $i++) {
        for ($j = $w - $wArr[$i]; $j >= 0; $j--) {
            if ($stages[$j] == true) $stages[$j + $wArr[$i]] = true;
        }
    }

    for ($i = $w; $i >= 0; $i--) {
        if ($stages[$i] == true) return $i;
    }
    
    return null;
}
echo knapsack2([2, 2, 4, 6, 3], 5, 9);
