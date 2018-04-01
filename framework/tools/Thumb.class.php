<?php
namespace framework\tools;
/*
 * Thumb pictures
 */
class Thumb
{

    private $file;          //picture files
    private $thumb_path;    //Thumb pictures story path
    //创建原图资源的函数(文件的mime类型和创建资源的映射关系)
    private $create_func = array(
        'image/png'  =>  'imagecreatefrompng',
        'image/jpeg' =>  'imagecreatefromjpeg',
        'image/gif'  =>  'imagecreatefromgif'
    );
    //保存图像资源的函数
    private $output_func = array(
        'image/png'  =>  'imagepng',
        'image/jpeg' =>  'imagejpeg',
        'image/gif'  =>  'imagegif'
    );
    //图像的mime类型
    private $mime;
    
    public function __set($p,$v)
    {
        if(property_exists($this, $p)){
            $this->$p = $v;
        }
    }
    public function __get($p)
    {
        if(property_exists($this, $p)){
            return $this->$p;
        }
    }
    
    //构造函数用来初始化属性
    public function __construct($file)
    {
        if(!file_exists($file)){
            //var_dump($file);
            echo '文件无效，请选择正确的文件';
            exit;
        }
        //执行到中这里，说明文件有效
        $this->file = $file;
        $this->mime = getimagesize($file)['mime'];
    }
    
    //参数1：压缩的范围宽度
    //参数2：压缩的范围的高度
    function makeThumb($area_w,$area_h)
    {    
        //参数2：原图资源（将该图片资源压缩之后，再保存到目的地画布中）
        $create_func = $this->create_func;
        $src_image = $create_func[$this->mime]($this->file);
        //参数3、4：目的地（画布的起点坐标）
        $dst_x = 0;
        $dst_y = 0;
        //参数5、6：原图的（起点坐标）
        $src_x = 0;
        $src_y = 0;
        //参数9、10：原图的宽度、高度
        //通过imagesx()函数获得图像资源的宽度、imagesy()获得图像资源的高度
        $src_w = imagesx($src_image);
        $src_h = imagesy($src_image);
    
        //参数7、8：目的地（画布的宽度、高度）
        //计算压缩的比例
        if($src_w / $area_w >= $src_h / $area_h){
            $scale = $src_w / $area_w;
        }else{
            $scale = $src_h / $area_h;
        }
    
        $dst_w = (int)$src_w / $scale;
        $dst_h = (int)$src_h / $scale;
    
    
        //参数1：目的地图像资源（通常指的是画布资源）
        $dst_image = imagecreatetruecolor($dst_w, $dst_h);
        $color = imagecolorallocate($dst_image, 255, 255, 255);
        $color = imagecolortransparent($dst_image,$color);
        
        imagefill($dst_image, 0, 0, $color);
    
    
        imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    
        //可以保存、也可以输出到浏览器
        //1. imagepng()增加第二个参数表示保存文件
        //通常会把压缩之后的图片保存到thumb子目录中,按照日期格式的子目录保存
        $sub_path = date('Ymd').'/';
        $path = $this -> thumb_path;
        if(!is_dir($path.$sub_path)){
           mkdir($path.$sub_path,0777,true); 
        }
        //thumb/20170402/
        //压缩的图像的文件名，在原文件名的基础上增加前缀：thumb_bs.png
        $origin_filename = basename($this->file);
        $thumb_name = 'thumb_'.$origin_filename;
        
        //header("Content-Type:image/png");
        $output_func = $this->output_func;
        $output_func[$this->mime]($dst_image,$path.$sub_path.$thumb_name);
        
        //最后，一定要把文件地址返回（接收之后最后保存起来）
        return $sub_path.$thumb_name;
    }
}