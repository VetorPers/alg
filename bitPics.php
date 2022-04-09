<?php

/**
 * Class bitPics
 */
class bitPics
{
    /**
     * 图片路径
     *
     * @var
     */
    protected $imgPath;

    /**
     * bitPics constructor.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->imgPath = $path;
    }

    /**
     * 解密字符串
     *
     * @return string
     */
    public function decodeStr()
    {
        $bitStr = $this->getBitStr();
        $utf8Str = $this->bitToUtf8($bitStr);

        return $utf8Str;
    }

    /**
     * 获取比特模式下的字串
     *
     * @return string
     */
    public function getBitStr()
    {
        $size = getimagesize($this->imgPath); // 获取图片尺寸
        $res = imagecreatefrompng($this->imgPath); // 创建图像
        $bitStr = '';

        // 遍历图片像素
        for ($i = 0; $i < $size[1]; ++$i) {
            for ($j = 0; $j < $size[0]; ++$j) {
                $rgb = imagecolorat($res, $j, $i); // 获取各个像素颜色索引值
                $rgbarray = imagecolorsforindex($res, $rgb); // 获取每个像素各颜色值
                $bitStr .= $rgbarray['red'] == 255 ? 0 : 1; // 白色为0，黑色为1
            }
        }

        return $bitStr;
    }

    /**
     * 比特模式转utf8
     *
     * @param $bitStr
     *
     * @return string
     */
    public function bitToUtf8($bitStr)
    {
        $str = '';
        $l = strlen($bitStr); // 字符长度
        // 遍历字符串，每8位为一个字符
        for ($i = 0; $i < $l; $i += 8) {
            $bit = substr($bitStr, $i, 8);
            $v = chr(bindec($bit));
            $str .= $v;
        }

        return $str;
    }
}

$imgPath = '/Users/vtr/Downloads/quiz5-abc.png';
$str = (new bitPics($imgPath))->decodeStr();
var_dump(md5($str));

