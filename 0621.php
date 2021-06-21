<?php

class ListNode
{
    var $val;
    var $next = NULL;
    function __construct($x)
    {
        $this->val = $x;
    }
}

function printListFromTailToHead($head)
{
    $p = $head;
    $q = null;

    while ($p) {
        $tmp = $p->next;
        $p->next = $q;
        $q = $p;
        $p = $tmp;
    }

    return $q;
}

$head = new ListNode(1);
$t = new ListNode(2);
$s = new ListNode(3);
$t->next = $s;
$head->next = $t;

print_r($head);
print_r(printListFromTailToHead($head));


function NumberOf1($n)
{
    $ret = 0;
    while ($n != 0) {
        $ret++;
        $n = $n & ($n - 1);
    }

    return $ret;
}
