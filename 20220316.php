<?php

function test()
{
    $str = "254.192.10.0";

    $pattern = '/((2([0-4]\d|5[0-5]))|[01]?\d{1,2})(\.((2([0-4]\d|5[0-5]))|[01]?\d{1,2})){3}/';

    preg_match($pattern, $str, $matches);
    print_r($matches);
}

test();
