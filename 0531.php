<?php


/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 * 
 * @param numbers int整型一维数组 
 * @return int整型
 */
function MoreThanHalfNum_Solution( $numbers )
{
    $cond = -1;
    $cnt = 0;
    
    $c = count($numbers);
    for($i=0;$i<$c;$i++){
       if($cnt==0){
            $cond = $numbers[$i];
            $cnt++;
        }else{
            $cond==$numbers[$i] ? $cnt++ : $cnt--;
        } 
    }
    
    return $cond;
}