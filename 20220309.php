<?php

function subArraySum($nums, $k)
{
    $preSum = [];
    $n = count($nums);
    $sum0_i = 0;
    $ans = 0;
    $preSum[0] = 1;

    for ($i=0;$i<$n;$i++) {
        $sum0_i += $nums[$i];
        $sum0_j = $sum0_i-$k;
        if (isset($preSum[$sum0_j])) {
            $ans += $preSum[$sum0_j];
        }

        $preSum[$sum0_i] = ($preSum[$sum0_i]??0)+1;
    }

    return $ans;
}

print subArraySum([3, 5, 2, -2, 4, 1], 5);
