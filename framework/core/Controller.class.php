<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/1/26
 * Time: 21:02
 * Base Controller
 */

namespace framework\core;
class Controller
{
    protected $smarty;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->initSmarty();
        $this->initTime();
    }

    /**
     * Initialize Smarty
     */

    public function initSmarty()
    {
        $this->smarty = new \Smarty();
        $this->smarty->left_delimiter = $GLOBALS['config']['left_delimiter'];
        $this->smarty->right_delimiter = $GLOBALS['config']['right_delimiter'];
        $this->smarty->setTemplateDir('./application/' . MODULE . '/view/');
        $this->smarty->setCompileDir('./application/' . MODULE . '/runtime/tpl_c');
    }

    /**
     * Initialize default Time zone
     */
    public function initTime()
    {
        date_default_timezone_set('PRC');
    }

    /**
     * Check is user or not
     */
    public function isLogin()
    {
        session_start();
        //If user
        if (isset($_SESSION['user'])) {
            //Remember me
            if (isset($_COOKIE['uname'])) {
                $m_user = Factory::M('home\model\user');
                $result = $m_user->loginCheck($_COOKIE['uname'], $_COOKIE['keysid']);
                //If user update his password
                if (!$result) {
                    return false;
                    //$this->showActionInfo('信息过期', '请重新登录，3s后会自动跳转到登录页面', '/?m=home&c=user&a=loginAction', '登录', 3000);
                } else {
                    $_SESSION['user'] = $_COOKIE['uname'];
                    return true;
                }
            }
        }
    }

    /**
     * Jump to another url , use to refresh the static page
     * @param $url
     * @param $message
     * @param $delay
     */
    public function jump($url, $message, $delay = 3000)
    {
        echo $message;
        if (!$GLOBALS['config']['debug']) {
            echo "<script language='javascript' type='text/javascript'>";
            echo "window.setTimeout(\"go()\",$delay);function go(){window.location.href='$url'}";
            echo "</script>";
        }
        die;
    }

    public function showActionInfo($title = null, $msg = null, $url = null, $b_title = null, $delay = 1000000)
    {
        $this->smarty->assign('url', $url);
        $this->smarty->assign('title', $title);
        $this->smarty->assign('msg', $msg);
        $this->smarty->assign('b_title', $b_title);
        if (!$GLOBALS['config']['debug']) {
            $this->smarty->display('msg.html');
            echo "<script language='javascript' type='text/javascript'>";
            echo "window.setTimeout(\"go()\",$delay);function go(){window.location.href='$url'}";
            echo "</script>";
        }
        die;
    }

}