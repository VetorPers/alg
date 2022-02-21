<?php

function search($nums,  $target)
{
    // write code here
    $cnt = count($nums);
    $left = 0;
    $right = $cnt - 1;

    while ($left <= $right) {
        $middle = $left + (($right - $left) >> 1);
        if ($nums[$middle] < $target) {
            $left = $middle + 1;
        } else {
            $right = $middle - 1;
        }
    }

    if ($left < $cnt && $nums[$left] == $target) {
        return $left;
    } else {
        return -1;
    }
}

// echo (search([1, 2, 4, 4, 5], 4));

function hasCycle($head)
{
    $slow = $fast = $head;
    while ($fast && $fast->next) {
        $slow = $slow->next;
        $fast = $fast->next->next;
        if ($slow == $fast) {
            return 1;
        }
    }

    return 0;
}

function kmp($S,  $T)
{
    // write code here
    $sl = strlen($S);
    $tl = strlen($T);

    $i = 0;
    $cnt = 0;
    while ($i <= $tl - $sl) {
        if (substr($T, $i, $sl) == $S) {
            $cnt++;
        }
        $i++;
    }

    return $cnt;
}


function qsort($nums)
{
    qsortRecursion($nums, 0, count($nums) - 1);
    return $nums;
}

function qsortRecursion(&$nums, $l, $r)
{
    if ($l >= $r) return;
    $partion = partion($nums, $l, $r);
    qsortRecursion($nums, $l, $partion - 1);
    qsortRecursion($nums, $partion + 1, $r);
}

function partion(&$nums, $l, $r)
{
    $p = $nums[$r];
    $i = $j = $l;
    for (; $j < $r; $j++) {
        if ($nums[$j] < $p) {
            [$nums[$i], $nums[$j]] = [$nums[$j], $nums[$i]];
            $i++;
        }
    }
    [$nums[$i], $nums[$r]] = [$nums[$r], $nums[$i]];

    return $i;
}

function qs($nums){
    
}

print_r(qsort([1, 3, 9, 2, 5]));
