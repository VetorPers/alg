<?php

// 最短距离（字符串s1 变成 s2 的最少步骤数）
function minDistance($s1, $s2)
{
    global $gs1,$gs2;
    $gs1 = $s1;
    $gs2 = $s2;
    return dp(strlen($s1)-1, strlen($s2)-1);
}

$arr = [];
function dp($i, $j)
{
    global $gs1,$gs2,$arr;
    if ($i==-1) {
        return $j+1;
    }
    if ($j==-1) {
        return $i+1;
    }
    if (isset($arr[$i][$j])) {
        return $arr[$i][$j];
    }
    if ($gs1[$i]==$gs2[$j]) {
        $arr[$i][$j]= dp($i-1, $j-1);
    } else {
        $arr[$i][$j] = min(
            dp($i, $j-1)+1,
            dp($i-1, $j-1)+1,
            dp($i-1, $j)+1
        );
    }

    return $arr[$i][$j];
}

print_r(minDistance('', 'apple')) ;

// 接雨水问题
 function trap($height)
 {
     $i = 0;
     $j = count($height) - 1;

     $ans = 0;
     $lmax = $height[$i];
     $rmax = $height[$j];

     while ($i<=$j) {
         $lmax = max($height[$i], $lmax);
         $rmax = max($height[$j], $rmax);

         if ($lmax<$rmax) {
             $ans += $lmax-$height[$i];
             $i++;
         } else {
             $ans += $rmax-$height[$j];
             $j--;
         }
     }

     return $ans;
 }

$res = trap([0, 1, 0, 2, 1, 0, 1, 3, 2, 1, 2, 1]);
echo $res;
