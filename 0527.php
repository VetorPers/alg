<?php

function reOrderArray($array)
{
    $odd = [];
    $even = [];
    foreach ($array as $val) {
        $val & 1 ? $odd[] = $val : $even[] = $val;
    }

    foreach ($even as $v) {
        $odd[] = $v;
    }

    return $odd;
}

print_r(reOrderArray(
    [1, 2, 3, 4]
));

function FindKthToTail($pHead,  $k)
{
    $quick = $slow = $pHead;

    for (; $k > 0; $k--) {
        if (!$quick) return null;
        $quick = $quick->next;
    }

    while ($quick) {
        $quick = $quick->next;
        $slow = $slow->next;
    }

    return $slow;
}


function ReverseList($head)
{
    $n = null;
    $p = $head;

    while ($p) {
        $tmp = $p->next;
        $p->next = $n;
        $n = $p;
        $p = $tmp;
    }

    return $n;
}

class listNode
{
    public $next;
    public $val;
    public function __construct($val)
    {
        $this->val = $val;
    }
}

function Merge($pHead1,  $pHead2)
{
    $p1 = $pHead1;
    $p2 = $pHead2;
    $resHead = $res = new listNode(0);
    while ($p1 || $p2) {
        if (!$p1) {
            $res->next = $p2;
            $p2 = $p2->next;
        } elseif (!$p2) {
            $res->next = $p1;
            $p1 = $p1->next;
        } else {
            if ($p1->val <= $p2->val) {
                $res->next = $p1;
                $p1 = $p1->next;
            } else {
                $res->next = $p2;
                $p2 = $p2->next;
            }
        }

        $res = $res->next;
    }

    return $resHead->next;
}
