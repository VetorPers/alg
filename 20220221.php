<?php

function binarySearch($arr, $num)
{
    $l = 0;
    $r = count($arr) - 1;

    while ($l <= $r) {
        $mid = $l + (int)(($r - $l)>>1);
        if ($arr[$mid] > $num) {
            $r = $mid - 1;
        } elseif ($arr[$mid] < $num) {
            $l = $mid + 1;
        } elseif ($arr[$mid] == $num) {
            return $mid;
        }
    }

    return -1;
}

function leftBound($arr, $num)
{
    $l = 0;
    $r = count($arr) - 1;

    while ($l <= $r) {
        $mid = $l + (int)(($r - $l) >> 1);
        if ($arr[$mid] < $num) {
            $l = $mid + 1;
        } elseif ($arr[$mid] > $num) {
            $r = $mid - 1;
        } elseif ($arr[$mid] == $num) {
            $r = $mid - 1;
        }
    }

    if ($l >= count($arr) || $arr[$l] != $num) {
        return -1;
    }
    return $l;
}

function rightBound($arr, $num)
{
    $l = 0;
    $r = count($arr) - 1;

    while ($l <= $r) {
        $mid = $l + (int)(($r - $l) >> 1);
        if ($num > $arr[$mid]) {
            $l = $mid + 1;
        } elseif ($num < $arr[$mid]) {
            $r = $mid - 1;
        } elseif ($num == $arr[$mid]) {
            $l = $mid + 1;
        }
    }

    if ($r < 0 || $arr[$r] != $num) {
        return -1;
    }
    return $r;
}

$ret = rightBound([1, 2, 4, 4, 8, 9], 4);
echo $ret;

function quickSort($arr)
{
    quickSortRecursive($arr, 0, count($arr) - 1);

    return $arr;
}

function quickSortRecursive(&$arr, $left, $right)
{
    if ($left >= $right) {
        return;
    }
    $partition = partition($arr, $left, $right);
    quickSortRecursive($arr, $left, $partition - 1);
    quickSortRecursive($arr, $partition + 1, $right);
}

function partition(&$arr, $left, $right)
{
    $pivot = $arr[$right];

    $i = $left;
    $j = $left;

    for (;$j<$right;$j++) {
        if ($arr[$j] < $pivot) {
            [$arr[$i], $arr[$j]] = [$arr[$j], $arr[$i]];
            $i++;
        }
    }

    [$arr[$i], $arr[$right]] = [$arr[$right], $arr[$i]];

    return $i;
}

$arr = [5, 2, 4, 9, 1];
print_r(quickSort($arr));


/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        $p = null;
        $q = $head;

        while($q){
            $tmp = $q->next;
            $q->next = $p;
            $p = $q;
            $q = $tmp;
        }

        return $p;
    }
}