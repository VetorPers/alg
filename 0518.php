<?php


/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 * 
 * @param target int整型 
 * @param array int整型二维数组 
 * @return bool布尔型
 */
function Find($target,  $array)
{
    $row = 0;
    $col = count($array[0]) - 1;

    while ($row < count($array) && $col >= 0) {
        if ($array[$row][$col] < $target) {
            $row++;
        } elseif ($array[$row][$col] > $target) {
            $col--;
        } else {
            return true;
        }
    }

    return false;
}

$res = Find(3, [[1, 2, 8, 9], [2, 4, 9, 12], [4, 7, 10, 13], [6, 8, 11, 15]]);
echo $res;
