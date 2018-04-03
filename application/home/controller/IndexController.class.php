<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/28
 * Time: 下午7:52
 */
namespace home\controller;
use framework\core\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->isLogin();
        $this->smarty->display('index.html');
    }

    public function activeAction()
    {
        $this->smarty->display('user/active_success.html');
    }

    public function  loginAction()
    {
        $this->smarty->display('user/login.html');
    }

    public function setAction()
    {
        $this->smarty->display('user/setting.html');
    }

    public function homeAction()
    {
        $this->smarty->display('user/all_users.html');
    }

}