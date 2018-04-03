<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/3
 * Time: 下午4:27
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Page;

class UserController extends Controller
{
    public function indexAction()
    {
        if ($this->isLogin()) {
            $this->smarty->display('home/setting.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function userDashBroad()
    {
        if ($this->isLogin()) {
            $u_model = Factory::M('RegisterUser');
            $page = new Page();
            //SUM

            $uer_num = $page->total_pages = $u_model->getUserCount();
            //var_dump($u_model->getUserCount());
            //How many data in one page
            $page->url = '/?m=admin&c=user&a=userDashBroad&';
            $page->pagesize = $GLOBALS['config']['page_limit'];
            //Now page
            $page->now_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page->now_page - 1) * $page->pagesize;
            $limit = $page->pagesize;
            //Get All User Info
            $users = $u_model->getAllUserInfo($offset, $limit);
            $page_bar = $page->create();
            $this->smarty->assign('user_num', $uer_num);
            $this->smarty->assign('page_bar', $page_bar);
            $this->smarty->assign('users', $users);
            $this->smarty->display('user/register_user.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function userDetail()
    {
        if ($this->isLogin()) {
            $u_model = Factory::M('RegisterUser');
            $user = $u_model->getUserDetail($_GET['u_id']);
            $scan_num = $u_model-> getUserScanCount($_GET['u_id']);
            $this->smarty->assign('scan_num',$scan_num[0]['scan_num']);
            $this->smarty->assign('user',$user);
            $this->smarty->display('user/user_detail.html');
            //var_dump($user);

        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

}