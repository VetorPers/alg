<?php

class Bitspic
{
    protected $imgPath;
    protected $hecData;
    protected $imgSize;

    public function __construct($path)
    {
        $this->imgPath = $path;
    }

    public function recognize()
    {
        $res = getimagesize($this->imgPath);
        $res2 = imagecreatefrompng($this->imgPath);
        var_dump($res);
    }

    public function getHec()
    {
        $size = getimagesize($this->imgPath);
        $res = imagecreatefrompng($this->imgPath);

        for ($i=0; $i < $size[1]; ++$i) {
            for ($j=0; $j < $size[0]; ++$j) {
                $rgb = imagecolorat($res, $j, $i);
                $rgbarray = imagecolorsforindex($res, $rgb);

                if ($rgbarray['red']==255) {
                    $data[$i][$j]=0;
                } else {
                    $data[$i][$j]=0;
                }
            }
        }

        $this->imgSize = $size;
        $this->hecData = $data;
        var_dump(implode('', $data[0]));
    }

    function decode($str, $prefix="&#") {
        var_dump(chr($str));
        return;
        $str = str_replace($prefix, "", $str);
        $a = explode(";", $str);
        $utf = '';
        foreach ($a as $dec) {
          if ($dec < 128) {
            $utf .= chr($dec);
          } else if ($dec < 2048) {
            $utf .= chr(192 + (($dec - ($dec % 64)) / 64));
            $utf .= chr(128 + ($dec % 64));
          } else {
            $utf .= chr(224 + (($dec - ($dec % 4096)) / 4096));
            $utf .= chr(128 + ((($dec % 4096) - ($dec % 64)) / 64));
            $utf .= chr(128 + ($dec % 64));
          }
        }
        var_dump($utf);
        return $utf;
      }

    public function magHorData()
    {
        $data = $this->hecData;
        $size = $this->imgSize;
        $z = 0;

        for ($i=0; $i<$size[1];$i++) {
            if (in_array('1', $data[$i])) {
                $z++;
                for ($j=0; $j < $size[0];$j++) {
                    if ($data[$i][$j] == '1') {
                        $newdata[$z][$j] = 1;
                    } else {
                        $newdata[$z][$j] = 0;
                    }
                }
            }

            return $this->horData = $newdata;
        }
    }

    public function magVerData($newdata)
    {
        for ($i=0;$i<132;++$i) {
            for ($j=1;$j<13;++$j) {
                $ndata[$i][$j] = $newdata[$j][$i];
            }
        }

        $sum = count($ndata);
        $c = 0;

        for ($a=0;$a<$sum;$a++) {
            $value = $ndata[$a];

            if (in_array(1, $value)) {
                $ndatas[$c] = $value;

                $c++;
            } elseif (is_array($value)) {
                $b = $c-1;

                if (in_array(1, $value[$b])) {
                    $ndatas[$c] = $value;

                    $c++;
                }
            }
        }

        return $this->verData = $ndatas;
    }

    /**
     * 显示电话号码…
     *
     *
     *
     * @param mixed $ndatas
     * @return unknown
     */

    public function showPhone($ndatas)
    {
        $phone = null;

        $d = 0;

        foreach ($ndatas as $key => $val) {
            if (in_array(1, $val)) {
                foreach ($val as $k => $v) {
                    $ndArr[$d].=$v;
                }
            }

            if (!in_array(1, $val)) {
                $d++;
            }
        }

        foreach ($ndArr as $key01 =>$val01) {
            $phone .= $this->initData($val01);
        }

        return $phone;
    }

    /**
     * 分离显示…
     *
     *
     *
     * @param unknown_type $dataArr
     */

    public function drawWH($dataArr)
    {
        if (is_array($dataArr)) {
            foreach ($dataArr as $key => $val) {
                foreach ($val as $k => $v) {
                    if ($v == 0) {
                        $c .= "".$v."";
                    } else {
                        $c .= $v;
                    }
                }

                $c .= "
";
            }
        }

        echo $c;
    }
}

$class = new Bitspic('/Users/vtr/Downloads/quiz5-tobe.png');
$class->decode('01000001');
