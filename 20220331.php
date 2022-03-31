<?php

function isValid($s)
{
    $stack = [];
    $n = 0;
    $sl = strlen($s);

    for ($i=0;$i<$sl;$i++) {
        if ($s[$i]=='(' || $s[$i]=='{' || $s[$i]=='[') {
            $stack[] = $s[$i];
            $n++;
        } else {
            if (!empty($stack) && $stack[$n-1]==leftOf($s[$i])) {
                array_pop($stack);
                $n--;
            } else {
                return false;
            }
        }
    }

    return empty($stack);
}

function leftOf($r)
{
    if ($r=='}') {
        return '{';
    }
    if ($r==']') {
        return '[';
    }
    if ($r==')') {
        return '(';
    }
}

var_dump(isValid('([[])'));
