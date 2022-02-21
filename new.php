<?php

$ip1 = '127.0.0.1';
$ip2 = '192.168.103.1';
$ip3 = '259.999.0.1';

function preg($ip){
    $pattern = '/[12][]/';
    $res = preg_match($pattern, $ip);
    
    
}

// id uid price created_at   order

// select distinct(uid) from order where created_at='2021-09-04';
