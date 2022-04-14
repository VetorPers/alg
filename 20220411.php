<?php

function test()
{
    $a = [
        [
            'name' => 'vv',
            'age'  => 14,
        ],
        [
            'name' => 'vtr',
            'age'  => 19,
        ],
        [
            'name' => 'vv1',
            'age'  => 11,
        ],
        [
            'name' => 'vv2',
            'age'  => 13,
        ],
    ];

    array_multisort(array_column($a, 'age'), SORT_ASC, $a);
    // print_r($a);

    $str = '255.190.1.0';
    $preg = '/(?:(?:[01]?\d{1,2}|25[0-5]|24\d)\.){3}(?:[01]?\d{1,2}|25[0-5]|24\d)/';

    preg_match_all($preg, $str, $matches);
    // print_r($matches);

    $a = [1 => 2, 2 => 3, 'c' => 1];
    $b = [1 => 4, 'c' => 2];
//    print_r(array_merge_recursive($a, $b));
}

function is_really_writable($file)
{
    // If we're on a Unix server with safe_mode off we call is_writable

//    if (DIRECTORY_SEPARATOR == '/' and @ini_get("safe_mode") == false) {
//        return is_writable($file);
//    }

    // For windows servers and safe_mode "on" installations we'll actually

    // write a file then read it. Bah...

    if (is_dir($file)) {
        $file = rtrim($file, '/') . '/' . md5(mt_rand(1, 100) . mt_rand(1, 100));

        if (($fp = @fopen($file, 'w')) === false) {
            return false;
        }

        fclose($fp);

        @chmod($file, 0755);

//        @unlink($file);

        return true;
    } elseif ( !is_file($file) or ($fp = @fopen($file, 'w')) === false) {
        return false;
    }

    fclose($fp);

    return true;
}

function isWritable()
{
    $res = is_writable('./a');
    var_dump($res);
}

test();
isWritable();
$res = is_('./');
//var_dump($res);

function is_($file)
{
    if (is_dir($file)) {
        $file = rtrim($file, '/') . '/' . md5(mt_rand(0, 100));
        $fp = fopen($file, 'w');
        if ( !$fp) return false;

        @unlink($file);
        fclose($fp);

    } elseif (is_file($file)) {
        $fp = fopen($file, 'w');
        if ( !$fp) return false;

        fclose($fp);
    }

    return true;
}

function getExt($url)
{
    $parseArr = parse_url($url);
    $path = $parseArr['path'];
    $file = basename($path);
    $index = strpos($file, '.');
    $ext = substr($file, $index + 1);
    var_dump($ext);
}

getExt('http://www.startphp.cn/abc/de/fg.php?id=1&name=vv');
