<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/28
 * Time: 下午10:16
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;

class IndexController extends Controller
{
    public function indexAction()
    {
        if ($this->isLogin()) {
            $model = Factory::M('RegisterUser');
            $num = $model->getNum();
            $this->smarty->assign('num',$num);
            $this->smarty->display('home/home.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function msg()
    {
        $this->smarty->display('msg.html');
    }

    public function login()
    {
        $this->smarty->display('user/login.html');
    }

}