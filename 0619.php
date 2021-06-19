<?php


/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 * 
 * @param input int整型一维数组 
 * @param k int整型 
 * @return int整型一维数组
 */
function GetLeastNumbers_Solution($input,  $k)
{
    // write code here
    $c = count($input);
    if ($c < $k) return [];

    $heap = array_slice($input, 0, $k);
    insertHeap($heap);
    for ($i = $k; $i < $c; $i++) {
        if ($input[$i] < $heap[0]) {
            $heap[0] = $input[$i];
            insertHeap($heap);
        }
    }

    sort($heap);
    return $heap;
}

function insertHeap(&$heap)
{
    $i = 0;
    $n = count($heap);

    while (true) {
        if (2 * $i + 1 < $n && $heap[$i] < $heap[2 * $i + 1]) {
            [$heap[$i], $heap[2 * $i + 1]] = [$heap[2 * $i + 1], $heap[$i]];
            $i = 2 * $i + 1;
        } elseif (2 * $i + 2 < $n && $heap[$i] < $heap[2 * $i + 2]) {
            [$heap[$i], $heap[2 * $i + 2]] = [$heap[2 * $i + 2], $heap[$i]];
            $i = 2 * $i + 2;
        } else {
            break;
        }
    }
}

function heapToUp(&$heap)
{
    $i = count($heap);
}

$ret = GetLeastNumbers_Solution(
    [4, 5, 1, 6, 2, 7, 3, 8],
    10
);
print_r($ret);
