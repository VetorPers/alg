<?php

function minWindow($s, $t)
{
    $need = [];
    $window = [];
    $left = 0;
    $right = 0;
    $start = 0;
    $len = pow(2, 32);
    $valid = 0;

    for ($i=0;$i<strlen($t);$i++) {
        if (isset($need[$t[$i]])) {
            $need[$t[$i]]++;
        } else {
            $need[$t[$i]] = 1;
        }
    }

    while ($right<strlen($s)) {
        $c = $s[$right];
        $right++;

        if (isset($need[$c])) {
            if (isset($window[$c])) {
                $window[$c]++;
            } else {
                $window[$c] = 1;
            }

            if ($window[$c]==$need[$c]) {
                $valid++;
            }
        }

        while ($valid==count($need)) {
            if ($right-$left<$len) {
                $start = $left;
                $len = $right-$left;
            }

            $d = $s[$left];
            $left++;
            if (isset($need[$d])) {
                if ($window[$d]==$need[$d]) {
                    $valid--;
                }
                $window[$d]--;
            }
        }
    }

    return $len==pow(2, 32) ? '' : substr($s, $start, $len);
}

function checkInClusion($s, $t)
{
    $need = $window=[];
    $left = $right = $valid = 0;

    for ($i=0;$i<strlen($t);$i++) {
        $need[$t[$i]] = ($need[$t[$i]] ??0)+1;
    }

    while ($right<strlen($s)) {
        $c = $s[$right];
        $right++;

        if (isset($need[$c])) {
            $window[$c] = ($window[$c]??0)+1;
            if ($window[$c]==$need[$c]) {
                $valid++;
            }
        }

        if ($valid==count($need)) {
            return true;
        }

        while ($right-$left>=strlen($t)) {
            $d = $s[$left];
            $left++;
            if (isset($need[$d])) {
                if ($window[$d]==$need[$d]) {
                    $valid--;
                }
                $window[$d]--;
            }
        }
    }

    return false;
}

function findChildIndex($s, $p)
{
    $need = $window = $res = [];
    $left = $right = $valid = 0;

    for ($i=0;$i<strlen($p);$i++) {
        $need[$p[$i]] = ($need[$p[$i]] ?? 0) + 1;
    }

    while ($right < strlen($s)) {
        $c = $s[$right];
        $right++;

        if (isset($need[$c])) {
            $window[$c] = ($window[$c] ?? 0) + 1;
            if ($window[$c] == $need[$c]) {
                $valid++;
            }
        }

        while ($right - $left >= strlen($p)) {
            if ($valid == count($need)) {
                $res[] = $left;
            }

            $d = $s[$left];
            $left++;

            if (isset($need[$d])) {
                if ($window[$d]==$need[$d]) {
                    $valid--;
                }

                $window[$d]--;
            }
        }
    }

    return $res;
}

function maxChildLen($s)
{
    $window = [];
    $left = $right = 0;
    $len = 0;

    while ($right<strlen($s)) {
        $c = $s[$right];
        $right++;
        $window[$c] = ($window[$c] ?? 0) + 1;

        while ($window[$c] > 1) {
            $d = $s[$left];
            $left++;
            $window[$d]--;
        }

        $len = max($len, $right-$left);
    }

    return $len;
}

print_r(maxChildLen('pwwkew', 'abc'));
