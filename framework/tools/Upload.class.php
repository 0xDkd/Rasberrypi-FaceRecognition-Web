<?php

namespace framework\tools;

use \finfo;

class Upload
{
    //定义成员属性
    private $upload_path;  //upload path
    private $maxsize = 2000 * 1024;        //file max size
    private $prefix;            //file prefix name
    private $tmp_path = UPLOADS_PATH . 'face.jpg';
    //allow upload file type
    private $allow_type = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif');

    public function __set($p, $v)
    {
        if (property_exists($this, $p)) {
            $this->$p = $v;
        }
    }

    public function __get($p)
    {
        return $this->$p;
    }

    /**
     *Upload file to service just can be use in form file
     * @param array $file
     * @return bool|string
     */
    public function doFormUpload($file)
    {

        //var_dump($file['type']);
        // sleep(5);
        //将临时文件移动到服务器的目录中
        //参数1：临时的文件名
        //参数2：目的地文件名
        //上传成功返回true，失败返回false
        $destination = $this->upload_path;

        //1. file size test
        $maxsize = $this->maxsize;     //200KB
        if ($file['size'] > $maxsize) {
            echo '图片太大了，服务器撑不下';
            exit;
        }
        //2. create a unique name for files
        //首先生成一个唯一的随机数作为文件的名字
        //参数1：前缀
        //参数2：布尔值，如果true化，更具有唯一性
        $filename = uniqid($this->prefix, true);
        //确定文件的后缀
        //strrchr()用来获得一个字符串中最后一次出现的字符,返回从该字符之后的部分
        //参数1：look needle from haystack,大海捞针
        $ext = strrchr($file['name'], '.');
        $new_filename = $filename . $ext;

        //3. 分目录存储上传的文件
        //按照日期创建子目录
        $sub_path = date('Ymd') . '/';
        //创建目录,先判断下  uploads/20170330是否存在，如果不存在则创建该目录
        if (!is_dir($destination . $sub_path)) {
            mkdir($destination . $sub_path, 0777, true);
        }
        $destination .= $sub_path . $new_filename;

        //4. 上传的文件类型是否支持
        $allow_type = $this->allow_type;
        $true_type = $file['type'];
        if (!in_array($true_type, $allow_type)) {
            echo '不支持该类型的文件';
            exit;
        }
        //实例化finfo对象,用来获得一个文件的真实的类型
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($file['tmp_name']);
        if (!in_array($type, $allow_type)) {
            echo '不支持该类型的文件';
            exit;
        }

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            //上传成功之后，要把地址返回，而且将来这个地址还要保存到数据库
            //通常返回从日期开始的相对的路径，便于将来进行拼接
            return $sub_path . $new_filename;
        } else {
            return false;
        }

    }

    /**
     * Warning this method is very dangerous ,please do not use in real web !!!!
     * Because this method can not check upload file mime type!
     * So all files I will make it to .jpg
     * @param  string | $file
     * @return bool|string
     */
    public function doBinaryUpload($file)
    {   //Base Path
        file_put_contents($this->tmp_path, $file);
        $destination = $this->upload_path;
        //1. file size test
        //2. create a unique name for files
        $filename = uniqid($this->prefix, true);
        //fix must be jpg !
        $new_filename = $filename . '.jpg';
        //Make dir by data like Ymd
        $sub_path = date('Ymd') . '/';
        //Make dir
        if (!is_dir($destination . $sub_path)) {
            mkdir($destination . $sub_path, 0777, true);
        }
        $destination .= $sub_path . $new_filename;
        if (rename($this->tmp_path, $destination)) {
            //Move to a correct dir
            return $sub_path . $new_filename;
        } else {
            return false;
        }
    }
}