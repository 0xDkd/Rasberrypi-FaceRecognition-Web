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
        if (isset($_SESSION['user'])){
            //Remember me
            if (isset($_COOKIE['uname'])){
                $m_user = Factory::M('user');
                $result = $m_user->loginCheck($_COOKIE['uname'],$_COOKIE['keysid']);
                //If user update his password
                if (!$result){
                    $this->jump('/?m=home&c=user&a=loginAction','信息过期，请重新登录');
                }else{
                    $_SESSION['user'] = $_COOKIE['uname'];
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

    public function getGravatarAvatar($mail)
    {
           $url = " https://cdn.v2ex.com/gravatar/".md5($mail)."png";
           return $mail;
    }


}