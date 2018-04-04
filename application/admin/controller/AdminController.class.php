<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/4
 * Time: 下午4:00
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Regex;

class AdminController extends Controller
{
    public function settingAction()
    {
        if ($this->isLogin()) {
            $a_model = Factory::M('user');
            $name = $_SESSION['user'];
            $admin = $a_model->getInfo($name);
            $this->smarty->assign('admin', $admin[0]);
            $this->smarty->display('admin/setting.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function doResetPassWord()
    {
        if ($this->isLogin()) {
            //Check Authenticate
            if ($_POST['authenticate'] == $GLOBALS['config']['authenticate_code']) {
                //Check password is same or not
                if ($_POST['password'] == $_POST['password-repeat']) {
                    $regexTest = new Regex();
                    //Use Regex Tool to check password regular
                    $checkPassword = $regexTest->checkPassWord($_POST['password']);
                    if ($checkPassword) {
                        //Update
                        $a_model = Factory::M('User');
                        $admin['password'] = md5($_POST['password']);
                        $where['admin_id'] = $_POST['admin_id'];
                        $a_model->update($admin, $where);

                        //Logout
                        if (empty($_SESSION['user'])) {
                            $this->showActionInfo(null, null, nulll, null, 0);
                            die;
                        }
                        unset($_SESSION['user']);
                        setcookie('uname', '', time() - 1);
                        setcookie('keysid', '', time() - 1);
                        $this->showActionInfo('更改成功，请重新登录', null, null, null, 20000);

                    } else {
                        $this->showActionInfo('密码不符合要求', null, null, null, 2000);
                    }
                } else {
                    $this->showActionInfo('两次密码不匹配', null, null, null, 2000);
                }
            } else {
                $this->showActionInfo('验证秘钥不正确', null, null, null, 2000);
            }
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

}