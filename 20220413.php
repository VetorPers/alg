<?php
$preg = '/^https?\:\/\/[\w\.]+\.(?:com|cn|org)/';
$str = 'http://www.baidu.com';

preg_match($preg, $str, $matches);
var_dump($matches);