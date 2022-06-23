<?php

function permuteRepeat($nums)
{
    $res = [];
    $track = [];

    backtrack($nums, $res, $track);

    return $res;
}

function backtrack($nums, &$res, &$track)
{
    if (count($track) == count($nums)) {
        $res[] = $track;
        return;
    }

    for ($i = 0; $i < count($nums); $i++) {
        $track[] = $nums[$i];
        backtrack($nums, $res, $track);
        array_pop($track);
    }
}

permuteRepeat([1, 2, 3]);


function wordBreak($s, $wordDict)
{
    $found = false;
    $track = [];

    wordBreakBacktrack($wordDict, $s, 0, $found, $track);

    return $found;
}

function wordBreakBacktrack($wordDict, $s, $i, &$found, &$track)
{
    if ($found) {
        return;
    }

    if ($i == strlen($s)) {
        $found = true;
        return;
    }

    foreach ($wordDict as $word) {
        $len = strlen($word);

        if (
            $i + $len <= strlen($s)
            && substr($s, $i, $len) == $word
        ) {
            $track[] = $word;
            wordBreakBacktrack($wordDict, $s, $i + $len, $found, $track);
            array_pop($track);
        }
    }
}

var_dump(wordBreak('aaab', ['a', 'aa', 'ab']));


function wordBreak2($s, $wordDict)
{
    $memo = array_fill(0, strlen($s), -1);

    return dp($s, $wordDict, 0, $memo);
}

function dp($s, $wordDict, $i, &$memo)
{
    if ($i == strlen($s)) {
        return true;
    }

    if ($memo[$i] != -1) {
        return $memo[$i] == 0 ? false : true;
    }

    for ($len = 1; $i + $len <= strlen($s); $len++) {
        $prefix = substr($s, $i, $len);
        if (in_array($prefix, $wordDict)) {
            $sub = dp($s, $wordDict, $i + $len, $memo);
            if ($sub) {
                $memo[$i] = 1;
                return true;
            }
        }
    }

    $memo[$i] = 0;

    return false;
}
var_dump(wordBreak2('aaab', ['a', 'aa', 'ab']));
