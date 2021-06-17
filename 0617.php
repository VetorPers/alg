<?php

function test()
{
    for ($i = 0; $i < 5; $i++) {
        print($i);
    }

    for ($j = 0; $j < 5; ++$j) {
        print($j);
    }

    $i = 3;
    $b = ++$i;
    $c = $i++;
    print($b);
    print($c);
}

test();
