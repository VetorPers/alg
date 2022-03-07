<?php

function permute($nums)
{
    $res = [];
    backtrack($nums, count($nums), 0, $res);

    return $res;
}

function backtrack(&$nums, $n, $first, &$res)
{
    if ($n==$first) {
        $res[] = $nums;
        return;
    }

    for ($i=$first;$i<$n;$i++) {
        [$nums[$first],$nums[$i]] = [$nums[$i], $nums[$first]];
        backtrack($nums, $n, $first+1, $res);
        [$nums[$first],$nums[$i]] = [$nums[$i], $nums[$first]];
    }
}

$res = permute([1, 2, 3]);
print_r($res);
