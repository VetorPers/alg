<?php

class gjPhone
{
    protected $imgPath; // 图片路径
  protected $imgSize; // 图片大小
  protected $hecData; // 分离后数组
  protected $horData; // 横向整理的数据
  protected $verData; // 纵向整理的数据
  public function __construct($path)
  {
      $this->imgPath = $path;
  }

    /**
     * 颜色分离转换...
     *
     * @param unknown_type $path
     * @return unknown
     */
    public function getHec()
    {
        $size = getimagesize($this->imgPath);
        $res = imagecreatefrompng($this->imgPath);
        for ($i = 0; $i < $size[1]; ++ $i) {
            for ($j = 0; $j < $size[0]; ++ $j) {
                $rgb = imagecolorat($res, $j, $i);
                $rgbarray = imagecolorsforindex($res, $rgb);
                if ($rgbarray['red'] < 125 || $rgbarray['green'] < 125 ||
             $rgbarray['blue'] < 125) {
                    $data[$i][$j] = 1;
                } else {
                    $data[$i][$j] = 0;
                }
            }
        }
        $this->imgSize = $size;
        $this->hecData = $data;
    }

    /**
     * 颜色分离后的数据横向整理...
     *
     * @return unknown
     */
    public function magHorData()
    {
        $data = $this->hecData;
        $size = $this->imgSize;
        $z = 0;
        for ($i = 0; $i < $size[1]; ++ $i) {
            if (in_array('1', $data[$i])) {
                $z ++;
                for ($j = 0; $j < $size[0]; ++ $j) {
                    if ($data[$i][$j] == '1') {
                        $newdata[$z][$j] = 1;
                    } else {
                        $newdata[$z][$j] = 0;
                    }
                }
            }
        }
        return $this->horData = $newdata;
    }

    /**
     * 显示电话号码...
     *
     * @param mixed $ndatas
     * @return unknown
     */
    public function showPhone($ndatas)
    {
        $phone = null;
        $d = 0;
        $ndArr=[];
        $str = '';
        foreach ($ndatas as $key => $val) {
            foreach ($val as $k => $v) {
                $str .= $v;
            }
        }

        $res='';
        $l = strlen($str);
        for($i=0;$i<$l;$i+=8){
           $bin= substr($str,$i,8);
           $v = chr(bindec($bin));
           $res.=$v;
        }
        var_dump($res);
    }

}

// echo decbin(ord('o'));
$imgPath = '/Users/vtr/Downloads/quiz5-abc.png';
$gjPhone = new gjPhone($imgPath);
$gjPhone->getHec();
$horData = $gjPhone->magHorData();
// $verData = $gjPhone->magVerData($horData);
$gjPhone->showPhone($horData);

