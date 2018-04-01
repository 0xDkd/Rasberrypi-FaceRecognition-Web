<?php

namespace framework\tools;
/*
 * Captcha Tool
 */
class Captcha
{
    //成员属性
    private $width = 100;   //画布的宽度
    private $height = 30;   //画布的高度
    private $number = 4;    //验证码的字符个数
    private $font_file = 'STHUPO.TTF';  //验证码的字体文件
    private $font_size = 20;    //验证码的字体大小
    private $caseSensitive = false;// 是否区分大小写

    public function __set($p, $v)
    {
        if (property_exists($this, $p)) {
            $this->$p = $v;
        }
    }

    public function __get($p)
    {
        if (property_exists($this, $p)) {
            return $this->$p;
        }
    }

    //开始绘制验证码
    public function makeImage()
    {
        //1. 创建画布，背景颜色应该是随机产生的，尽量背景颜色浅一点
        $image = imagecreatetruecolor($this->width, $this->height);
        //2. 分配颜色
        $color = imagecolorallocate($image, mt_rand(100, 255), mt_rand(100, 255), mt_rand(100, 255));
        imagefill($image, 0, 0, $color);

        //3. 开始绘制文字
        $code = $this->makeCode();

        //将该验证码保存到session中
        session_start();
        if (!$this->caseSensitive) {
            $_SESSION['code'] = strtolower($code);
        } else {
            $_SESSION['code'] = $code;
        }

        for ($i = 0; $i < strlen($code); $i++) {
            imagettftext($image, $this->font_size, mt_rand(-30, 30), ($this->width / $this->number) * $i + 5, 20, mt_rand(0, 100), $this->font_file, $code[$i]);

        }
        //绘制100个干扰像素点
        for ($i = 0; $i < 100; $i++) {
            imagesetpixel($image, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, 100));
        }

        //练习：绘制10条干扰线条
        for ($i = 0; $i < 10; $i++) {
            $color = imagecolorallocate($image, mt_rand(100, 150), mt_rand(100, 150), mt_rand(100, 150));
            imageline($image, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
        }

        //3. 输出到浏览器
        header("Content-Type:image/png");
        imagepng($image);
        //4. 销毁图像资源
        imagedestroy($image);
    }

    //生成随机的字符
    public function makeCode()
    {
        //大写字母,range()用来生成一个数组，包含从指定的开始字符到结束字符范围内的元素的数组
        $upper = range('A', 'Z');
        //小写字母
        $lower = range('a', 'z');
        //数字,避免0、1、2
        $number = range(3, 9);
        //把3个数组合并成一个数组
        $code = array_merge($lower, $upper, $number);
        //打乱数组顺序
        shuffle($code);
        //根据属性中指定的字符个数，创建字符
        $str = '';
        for ($i = 0; $i < $this->number; $i++) {
            $str .= $code[$i];
        }
        //echo '<pre>';
        //var_dump($str);
        return $str;
    }
}