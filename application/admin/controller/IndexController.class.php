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
            //统计信息
            $r_model = Factory::M('RegisterUser');
            $num = $r_model->getNum();
            //管理员信息
            $u_model = Factory::M('User');
            $user = $_SESSION['user'];
            $data = $u_model->getInfo($user);
            $url = " https://cdn.v2ex.com/gravatar/" . md5($data[0]['email']) . ".png";
            $_SESSION['gravatar'] = $url;
            $this->smarty->assign('num', $num);
            $this->smarty->display('home/home.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=User&a=loginAction', '登录', 2000);
        }
    }
}