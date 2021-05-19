<?php

/*
把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。
输入一个非递减排序的数组的一个旋转，输出旋转数组的最小元素。
NOTE：给出的所有元素都大于0，若数组大小为0，请返回0。
*/

function minNumberInRotateArray($rotateArray)
{
    $c = count($rotateArray);
    if (!$c) return 0;

    $l = 0;
    $r = $c - 1;
    while ($l < $r) {
        if ($rotateArray[$l] < $rotateArray[$r]) return $rotateArray[$l];

        $m = $l + (($r - $l) >> 1);
        if ($rotateArray[$m] < $rotateArray[$r]) {
            $r = $m;
        } elseif ($rotateArray[$m] > $rotateArray[$r]) {
            $l = $m + 1;
        } else {
            $r--;
        }
    }

    return $rotateArray[$r];
}

echo (minNumberInRotateArray([6, 7, 8, 9, 1, 2, 3, 4, 5]));


// 斐波那契数列公式为：f[n] = f[n-1] + f[n-2]
function fibonacci($n)
{
    $dp = [];
    fibona($n, $dp);
}

function fibona($n, &$dp)
{
    if ($n == 0 || $n == 1) return $n;

    if (isset($dp[$n])) return $dp[$n];

    $dp[$n] = fibona($n - 1, $dp) + fibona($n - 2, $dp);
    return $dp[$n];
}
