<?php

function test(){
    $pattern  = '/(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}([01]?\d{1,2}|2[0-4]\d|25[0-5])/';
    $str = '192.169.1.1';
    preg_match($pattern,$str,$matches);
    print_r($matches);
}

test();