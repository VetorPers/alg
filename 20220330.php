<?php

function longestPalindrome($s, $sl)
{
    $res = '';
    for ($i=0;$i<$sl;$i++) {
        $res1 = palindrome($s, $sl, $i, $i);
        $res = strlen($res1)>strlen($res) ? $res1 : $res;
        $res2 = palindrome($s, $sl, $i, $i+1);
        $res = strlen($res2)>strlen($res) ? $res2 : $res;
    }

    return $res;
}

function palindrome($s, $sl, $l, $r)
{
    while ($l>=0 && $r<$sl && $s[$l]==$s[$r]) {
        $l--;
        $r++;
    }

    return substr($s, $l+1, $r-$l-1);
}

echo longestPalindrome('acddcae', 7);
