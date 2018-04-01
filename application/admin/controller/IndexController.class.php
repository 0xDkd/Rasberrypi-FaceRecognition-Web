<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/28
 * Time: 下午10:16
 */

namespace admin\controller;


use framework\core\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->smarty->display('index.html');
    }

    public function msg()
    {
        $this->smarty->display('msg.html');
    }

    public function  login()
    {
        $this->smarty->display('user/login.html');
    }

}