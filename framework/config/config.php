<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/2/6
 * Time: 9:01
 */
return array(
    //!!!DEBUG!!! Please check it
    'debug'              => false
,
    'web_const'          => true,
    //基础配置项
    'email'              => 'smtp',
    'web_name'           => '树莓派人脸识别',
    'web_ico'            => '',
    'web_logo'           => '',
    //网站默认加密key
    'en_key'             => 'laksdjfowqer23jsdfasnaswe',

    //数据库配置选项
    'host'               => 'localhost',
    'user'               => 'homestead',
    'pass'               => 'secret',
    'dbname'             => 'face',
    'port'               => '3306',
    'charset'            => 'utf8',
    //数据库表的前缀
    'table_prefix'       => 'face_',
    //Smarty配置选项
    'left_delimiter'     => '<{',
    'right_delimiter'    => '}>',
    //默认前台和后台的分发
    'default_module'     => 'home',
    'default_controller' => 'Index',
    'default_action'     => 'IndexAction',
    //图片上传大小控制
    'pic_size'           => 2000 * 1024,
    'pic_prefix'         => 'face',
    //分页限制
    'page_limit'         => 5,

    //SMTP配置
    'smtp'               => true,
    'email_host'         => 'smtpdm.aliyun.com',
    'email_safe'         => 'ssl',
    'Port'               => 465,
    'sender'             => '',
    'E_nickname'         => '',
    'account'            => '',
    'token'              => '',
);

