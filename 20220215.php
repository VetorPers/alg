<?php

function binarySearch($nums, $target)
{
    $left = 0;
    $right = count($nums) - 1;

    while ($left<=$right) {
        $mid = $left + (int)(($right-$left)>>1);
        if ($nums[$mid]>$target) {
            $right = $mid - 1;
        } elseif ($nums[$mid]<$target) {
            $left = $mid + 1;
        } elseif ($nums[$mid]==$target) {
            return $mid;
        }
    }

    return -1;
}

function left_bound($nums, $target)
{
    $left = 0;
    $right = count($nums) - 1;
    while ($left<=$right) {
        $mid = $left + (int)(($right-$left)/2);
        if ($nums[$mid]<$target) {
            $left = $mid+1;
        } elseif ($nums[$mid]>$target) {
            $right = $mid -1;
        } else {
            $right = $mid-1;
        }
    }

    if ($left>=count($nums)||$nums[$left]!=$target) {
        return -1;
    }
    return $left;
}

function right_bound($nums, $target)
{
    $left = 0;
    $right = count($nums) -1;
    while ($left<=$right) {
        $mid = $left + (int)($right-$left)/2;
        if ($nums[$mid]<$target) {
            $left = $mid+1;
        } elseif ($nums[$mid]>$target) {
            $right = $right -1;
        } elseif ($nums[$mid]==$target) {
            $left = $mid+1;
        }
    }

    if ($right<0 || $nums[$right]!=$target) {
        return -1;
    }

    return $right;
}

echo left_bound([1, 3, 4, 5, 7, 8, 9, 10], 5);
