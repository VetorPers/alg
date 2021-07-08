<?php

function permute($arr)
{
    $res = [];
    $track = [];
    backtrack($arr, $track, $res);

    return $res;
}

function backtrack($arr, $track, &$res)
{
    if (count($track) == count($arr)) {
        $res[] = $track;
        return;
    }

    for ($i = 0; $i < count($arr); $i++) {
        if (in_array($arr[$i], $track)) continue;

        $track[] = $arr[$i];
        backtrack($arr, $track, $res);
        array_pop($track);
    }
}

// print_r(permute([1, 2, 3]));


function vpermute($arr)
{
    $res = [];
    $track = [];
    vbacktrack($arr, $track, $res);

    return $res;
}

function vbacktrack($arr, $track, &$res)
{
    if (count($arr) == count($track)) {
        $res[] = $track;
        return;
    }

    for ($i = 0; $i < count($arr); $i++) {
        if (in_array($arr[$i], $track)) continue;

        $track[] = $arr[$i];
        vbacktrack($arr, $track, $res);
        array_pop($track);
    }
}

// print_r(vpermute([1, 2, 3]));

function backPack($i, $cw, $items, $n, $w, &$maxW)
{
    if ($cw == $w || $i == $n) {
        if ($cw > $maxW) $maxW = $cw;
        return;
    }

    backPack($i + 1, $cw, $items, $n, $w, $maxW);
    if ($cw + $items[$i] <= $w) {
        backPack($i + 1, $cw + $items[$i], $items, $n, $w, $maxW);
    }
}

// $maxW = 0;
// backPack(0, 0, [2, 3, 5], 3, 11, $maxW);
// echo $maxW;


function nQueens($n)
{
    $res = [];
    $board = [];
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n; $j++) {
            $board[$i][$j] = '.';
        }
    }
    qbacktrack($board, 0, $res);
    return $res;
}

function qbacktrack($board, $row, &$res)
{
    if (count($board) == $row) {
        $res[] = $board;
        return;
    }

    $cnt = count($board[$row]);
    for ($i = 0; $i < $cnt; $i++) {
        if (!qisvalid($board, $row, $i)) continue;

        $board[$row][$i] = 'Q';
        qbacktrack($board, $row + 1, $res);
        $board[$row][$i] = '.';
    }
}

function qisvalid($board, $row, $col)
{
    $leftcol = $col - 1;
    $rightcol = $col + 1;
    for ($i = $row - 1; $i >= 0; $i--) {
        if ($board[$i][$col] == 'Q') return false;
        if (isset($board[$i][$leftcol]) && $board[$i][$leftcol] == 'Q') return false;
        if (isset($board[$i][$rightcol]) && $board[$i][$rightcol] == 'Q') return false;
        $leftcol--;
        $rightcol++;
    }
    return true;
}

$res = nQueens(4);
foreach ($res as $item) {
    for ($i = 0; $i < 4; $i++) {
        echo implode('', $item[$i]) . PHP_EOL;
    }

    echo '###############' . PHP_EOL . PHP_EOL . PHP_EOL;
}

