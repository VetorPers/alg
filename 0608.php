<?php

function multiply($A)
{
    $n = count($A);
    $B = [1];

    for ($i = 1; $i < $n; $i++) {
        $B[$i] = $B[$i - 1] * $A[$i - 1];
    }

    $tmp = 1;
    for ($j = $n - 2; $j >= 0; $j--) {
        $tmp *= $A[$j + 1];
        $B[$j] *= $tmp;
    }
    return $B;
}

/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/
function EntryNodeOfLoop($pHead)
{
    $fast = $slow = $pHead;

    while ($fast) {
        $fast = $fast->next->next;
        $slow = $slow->next;

        if ($fast == $slow) break;
    }

    if (!$fast) return null;

    $slownd = $pHead;
    while ($slownd != $slow) {
        $slow = $slow->next;
        $slownd = $slownd->next;
    }

    return $slow;
}

echo time();