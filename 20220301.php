<?php

function minWindow($s, $t)
{
    // 需要的字符数
    $need = [];
    // 窗口的字符数
    $window = [];
    // 窗口左边界
    $left =0;
    // 窗口右边界
    $right = 0;
    // 最小子串开始位置
    $start = 0;
    // 子串长度
    $len = pow(2, 32);
    // 符合字符数的字符数量
    $valid = 0;

    for ($i=0;$i<strlen($t);$i++) {
        isset($need[$t[$i]]) ? $need[$t[$i]]++ : $need[$t[$i]]=1;
    }

    while ($right<strlen($s)) {
        // 右滑动
        $c = $s[$right];
        $right++;

        // 需要的字符
        if (isset($need[$c])) {
            // 窗口包含字符数加1
            isset($window[$c]) ? $window[$c]++ : $window[$c]=1;
            // 满足需要的字符数量
            if ($window[$c]==$need[$c]) {
                $valid++;
            }
        }

        while ($valid == count($need)) {
            // 先更新满足的最小子串
            if ($right-$left<$len) {
                $start = $left;
                $len = $right-$left;
            }

            // 左滑动
            $d = $s[$left];
            $left++;

            if (isset($need[$d])) {
                if ($window[$d]==$need[$d]) {
                    $valid--;
                }
                $window[$d]--;
            }
        }
    }

    return $len==pow(2, 32) ? "" : substr($s, $start, $len);
}

echo minWindow('ADOBECODEBANC', 'ABC');
