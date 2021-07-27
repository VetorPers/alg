<?php

function arrayTest(){
    $arr = [1,3,4,2,6];
    arsort($arr);
    $arr = array_filter($arr);
    print_r($arr);
}

arrayTest();