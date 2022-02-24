<?php

// class listNode
// {
//     public $val = 0;
//     public $next = null;

//     public function __construct($val)
//     {
//         $this->val = $val;
//     }
// }

 function middleNode($head)
 {
     $slow = $fast= $head;
     while ($fast&&$fast->next) {
         $slow = $slow->next;
         $fast = $fast->next->next;
     }

     return $slow;
 }

 function removeNthFromEnd($head, $n)
 {
     $slow = $fast = $head;

     while ($n>0 && $fast) {
         $fast = $fast->next;
         $n--;
     }

     if (!$fast) {
         return $head->next;
     }

     while ($fast && $fast->next) {
         $slow = $slow->next;
         $fast = $fast->next;
     }

     $slow->next = $slow->next->next;

     return $head;
 }
