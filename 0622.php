<?php
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/

/**
 * 代码中的类名、方法名、参数名已经指定，请勿修改，直接返回方法规定的值即可
 *
 * 
 * @param pRoot TreeNode类 
 * @return TreeNode类
 */
function Mirror($pRoot)
{
    if ($pRoot == null) return $pRoot;
    while ($pRoot) {
        [$pRoot->left, $pRoot->right] = [$pRoot->right, $pRoot->left];
        Mirror($pRoot->left);
        Mirror($pRoot->right);
        return $pRoot;
    }
}

function FirstNotRepeatingChar($str)
{
    $hashArr = [];
    $len = strlen($str);

    for ($i = 0; $i < $len; $i++) {
        $val = $str[$i];
        if (!isset($hashArr[$val])) {
            $hashArr[$val] = $i;
        } else {
            $hashArr[$val] = -1;
        }
    }

    for ($i = 0; $i < $len; $i++) {
        if ($hashArr[$str[$i]] >= 0) return $i;
    }

    return -1;
}
