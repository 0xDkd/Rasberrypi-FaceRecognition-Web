<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/1/26
 * Time: 17:06
 * 用来实例化模型，模式是单例模式，返回值是实例化的模型
 */
namespace framework\core;
class Factory
{
    public static function M($model_name)
    {
        //Add Model to $model_name
        if (substr($model_name,-5) != 'Model'){
            $model_name .= 'Model';
        }
        if (strchr($model_name,'\\')){

        }else{
            $model_name = MODULE. '\model\\'.$model_name;
        }

        static $model_list = array();
        if (!isset($model_list[$model_name])){
            $model_list[$model_name] = new $model_name;
        }
        return $model_list[$model_name];
    }
}

