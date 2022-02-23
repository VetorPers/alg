<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 * @param mixed $head
 */

function hasCycle($head)
{
    $slow = $fast = $head;

    while (!$fast) {
        $fast = $fast->next->next;
        $slow = $slow->next;

        if ($fast==$slow) {
            return true;
        }
    }

    return false;
}

function startPosition($head)
{
    if (!$head || !$head->next) {
        return false;
    }
    $slow = $fast = $head;

    while ($fast!=null && $fast->next!=null) {
        $fast = $fast->next->next;
        $slow = $slow->next;

        if ($fast==$slow) {
            $slow = $head;
            while ($slow!=$fast) {
                $slow = $slow->next;
                $fast = $fast->next;
            }

            return $slow;
        }
    }

    return false;
}
