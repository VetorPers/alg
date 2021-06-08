<?php


/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 *
 * 
 * @param numbers int整型一维数组 
 * @return int整型
 */
function duplicate($numbers)
{
    $arr = [];
    $n = count($numbers);
    for ($i = 0; $i < $n; $i++) {
        if (isset($arr[$numbers[$i]])) return $$numbers[$i];
        $arr[$numbers[$i]] = 1;
    }

    return -1;
}

function add($num1, $num2)
{
    while ($num2) {
        $tmp = $num1 ^ $num2;
        $num2 = ($num1 & $num2) << 1;
        $num1 = $tmp;
    }

    return $num1;
}

echo add(5, 7);


function Sum_Solution($n)
{
    $n > 1 && $n += Sum_Solution($n - 1);

    return $n;
}

function IsContinuous($numbers)
{
    $n = count($numbers);
    $tmpArr = [];
    for ($i = 0; $i < $n; $i++) {
        if($numbers[$i]){
            if(isset($tmpArr[$numbers[$i]]) && $numbers[$i])return false;
        }else{
            isset($tmpArr[$numbers[$i]]) ? $tmpArr[$numbers[$i]]++ : $tmpArr[$numbers[$i]] = 1;
        }

        if(isset($tmpArr[$numbers[$i]]) && $numbers[$i])return false;
        isset($tmpArr[$numbers[$i]]) ? $tmpArr[$numbers[$i]]++ : $tmpArr[$numbers[$i]] = 1;
    }
}
