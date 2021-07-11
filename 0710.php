<?php

// function coinChange($coins, $amount, &$dp)
// {
//     if ($amount == 0) return 0;
//     if (isset($dp[$amount])) return $dp[$amount];

//     $max = 9999;
//     foreach ($coins as $coin) {
//         if ($amount - $coin < 0) continue;

//         $sub = coinChange($coins, $amount - $coin, $dp);;
//         if ($sub == -1) continue;
//         $max = min($max, $sub + 1);
//     }

//     $dp[$amount] = $max == 9999 ? -1 : $max;
//     return $dp[$amount];
// }

function coinChange($coins, $amount)
{
    for ($i = 0; $i < $amount + 1; $i++) {
        $dp[$i] = $amount + 1;
    }
    $dp[0] = 0;

    for ($i = 0; $i < $amount + 1; $i++) {
        foreach ($coins as $coin) {
            if ($i - $coin < 0) continue;

            $dp[$i] = min($dp[$i], 1 + $dp[$i - $coin]);
        }
    }

    return $dp[$amount] == $amount + 1 ? -1 : $dp[$amount];
}

print_r(coinChange([1, 2, 5], 11));
