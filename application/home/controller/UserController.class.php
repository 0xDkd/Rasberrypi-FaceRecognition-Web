<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/2
 * Time: 下午4:38
 */

namespace home\controller;


use framework\core\Controller;
use framework\tools\Captcha;
use framework\tools\Email;
use framework\tools\EmailTemples;
use framework\tools\Encrypt;
use framework\tools\Regex;
use framework\core\Factory;


class UserController extends Controller
{

    public function registerAction()
    {
        if ($this->isLogin()) {
            $this->showActionInfo('您已经登录', null, '/?m=admin', '返回', 3000);
        } else {
            $this->smarty->display('user/login.html');
        }
    }

    public function loginAction()
    {
        if ($this->isLogin()) {
            $this->showActionInfo('您已经登录', null, '/?m=admin', '返回', 3000);
        } else {
            $this->smarty->display('user/login.html');
        }
    }


    public function resetPassWordAction()
    {
        $this->smarty->display('user/rest_password.html');
    }

    public function doRegisterAction()
    {
        if ($this->isLogin()) {
            $this->showActionInfo('您已经登录', null, '/?m=admin', '返回', 3000);
        } else {


            //Check Captcha
            session_start();
            if (strtolower($_SESSION['code']) == strtolower($_POST['seccode_verify'])) {
                //check authenticate
                if ($_POST['authenticate'] != $GLOBALS['config']['authenticate_code']) {
                    $this->showActionInfo('认证秘钥错误！');
                }
                //check password is same
                if ($_POST['password'] != $_POST['password-repeat']) {
                    $this->showActionInfo('两次密码不一致');
                }
                //Check Email & Username & Password
                if ($this->checkUEP()) {
                    //Check the user has already in here
                    $m_user = Factory::M('User');
                    $result = $m_user->checkRepeatUser($_POST['user_name'], $_POST['email']);
                    if (!$result) {
                        //If repeat
                        $this->showActionInfo('用户已经存在');
                    } else {
                        //Send Active Link
                        $this->emailConfig($_POST['email'], $_POST['user_name']);
                    }
                } else {
                    //
                    $this->showActionInfo('邮箱，用户名，密码格式不正确');
                }
            } else {
                //Captcha Error
                $this->showActionInfo('验证码不正确');
            }
        }
    }

    public function doLoginAction()
    {
        if ($this->isLogin()) {
            $this->showActionInfo('您已经登录', null, '/?m=admin', '返回', 3000);
        } else {
            if (strtolower($_SESSION['code']) != strtolower($_POST['seccode_verify'])) {
                $this->showActionInfo('验证码错误');
            }
            $data['name'] = $_POST['user_name'];
            $data['password'] = md5($_POST['password']);
            $model = Factory::M('user');
            //check $_POST data
            if ($model->loginCheck($data['name'], $data['password'])) {
                //Check is active or not
                if ($this->isActive($_POST['user_name'])) {
                    //Check use Remember or not
                    //Remember me
                    //Set cookie to judge user choose keep login time
                    setcookie('uname', $_POST['user_name'], time() + 7 * 24 * 3600);
                    setcookie('keysid', $data['password'], time() + 7 * 24 * 3600);
                    //Store user_name in session

                    $_SESSION['user'] = $data['password'];
                    $this->showActionInfo('登录成功', '3s后将会自动跳转到后台', '/?m=admin', '进入后台');

                } else {
                    $this->showActionInfo('没有激活', '请先激活你对账户，然后再进行登录');
                }
            } else {
                $this->showActionInfo('登录失败', '用户名不存在或者用户名与密码不匹配<br>请重试');
            }
        }

    }

    public function doForgetPassWord()
    {
        $model = Factory::M('User');
        //Check user exist or not
        $where['email'] = $_POST['email'];
        $regex = new Regex();
        $checkEmail = $regex->checkEmail($_POST['email']);
        if (!$checkEmail) {
            $this->showActionInfo('邮箱格式不正确');
        }
        $user = $model->find(null, $where);
        if ($user) {
            //Send Email
            $email = new EmailTemples();

        } else {
            $this->showActionInfo('用户名不存在');
        }
    }

    public function doLogout()
    {
        $this->isLogin();
        if (empty($_SESSION['user'])) {
            $this->showActionInfo(null, null, nulll, null, 0);
            die;
        }
        unset($_SESSION['user']);
        setcookie('uname', '', time() - 1);
        setcookie('keysid', '', time() - 1);
        $this->showActionInfo('退出成功', '希望下次再来哟～', '/', '返回首页', '2000');
    }


    public function makeCaptchaAction()
    {
        $captcha = new Captcha();
        $captcha->font_file = FONT_PATH . 'FiraCode-Light.TTF';
        $captcha->height = 40;
        $captcha->makeImage();
    }

    private function emailConfig()
    {
        $email = new EmailTemples();
        //Insert into MySQL
        $data['name'] = $_POST['user_name'];
        $data['password'] = md5($_POST['password']);
        $data['email'] = $_POST['email'];
        $data['active_code'] = $email->en_code;
        $data['is_active'] = 0;
        $data['reg_time'] = time();

        $model = Factory::M('user');
        $model->insert($data);

        //Send Email
        $email->activeEmail($_POST['email'], $_POST['user_name']);

        $this->showActionInfo('注册邮件已发送～', '请仔细检查您对邮箱哟～', '/', '< 返回首页');
    }

    private function checkUEP()
    {
        $regexTest = new Regex();
        //Use Regex Tool to check
        $checkUser = $regexTest->checkUser(null, null, $_POST['user_name']);
        $checkPassword = $regexTest->checkPassWord($_POST['password']);
        $checkEmail = $regexTest->checkEmail($_POST['email']);
        if ($checkUser && $checkEmail && $checkPassword) {
            return true;
        } else {
            return false;
        }
    }

    public function checkActiveEmail()
    {
        $de = new Encrypt();
        $code = substr($_GET['code'], 32);
        $validityPeriod = time() - $de->decrypt($code, $GLOBALS['config']['en_key']);
        if ($this->isCode($_GET['code'], $_GET['user'])) {
            if ($validityPeriod > 24 * 3600) {
                $this->showActionInfo('激活码过期');
            } elseif ($this->isActive($_GET['user'])) {
                $this->showActionInfo('您已激活', '您可以直接登录啦～', '/?c=user&a=loginAction', '<< 去登录');
            } else {
                $this->doActive($_GET['user']);
                $this->showActionInfo('激活成功！', '请在这里开始一段新的 旅程吧～', '/?c=user&a=loginAction', '<< 去登录');
            }
        } else {
            $this->showActionInfo('激活失败', '您对激活链接不正确，请重试');
        }
    }

    private function isActive($user_name)
    {
        $model = Factory::M('User');
        $where['name'] = $user_name;
        $data = $model->find(null, $where);
        return $data[0]['is_active'];

    }

    private function doActive($user_name)
    {
        $model = Factory::M('user');
        $model->makeActive($user_name);
    }

    private function isCode($code, $user)
    {
        $model = Factory::M('user');
        return $model->checkCode($code, $user);
    }

}