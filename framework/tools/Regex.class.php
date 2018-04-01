<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/18
 * Time: 上午12:27
 * Regex Tool
 */

namespace framework\tools;


class Regex
{
    //Commonly Regular expression
    private $validate = array(
        'require'  => '/.+/',
        'email'    => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
        'url'      => '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/',
        'currency' => '/^\d+(\.\d+)?$/',
        'number'   => '/^\d+$/',
        //zip code
        'zip'      => '/^\d{6}$/',
        'integer'  => '/^[-\+]?\d+$/',
        'double'   => '/^[-\+]?\d+(\.\d+)?$/',
        'english'  => '/^[A-Za-z]+$/',
        'qq'       => '/^\d{5,11}$/',
        'mobile'   => '/^1(3|4|5|7|8)\d{9}$/',
        //6到30位，字母数字下划线到组合，字母开头
        'user'     => '/^[a-zA-Z][\w-_]{5,29}$/',
        'password' => '/^[\w!@#$%%^&*(*)_+-=]{6,15}$/',
    );
    //Show match or not
    private $returnMatchResult = false;
    //Your fixMode
    private $fixMode = null;
    //Regular expression
    private $matches = array();
    //Is match ?
    private $isMatch = false;

    public function __construct($returnMatchResult = false, $fixMode = null)
    {
        $this->returnMatchResult = $returnMatchResult;
        $this->fixMode = $fixMode;
    }

    /**
     * The most important method . Can only run in this class , provide a method for public regex method
     * @param $pattern
     * @param $subject
     * @return array|bool
     */

    private function regex($pattern, $subject)
    {
        if (array_key_exists(strtolower($pattern), $this->validate)) {
            $pattern = $this->validate[$pattern] . $this->fixMode;
        }
        //Check $this->returnMatchResult
        $this->returnMatchResult ?
            preg_match_all($pattern, $subject, $this->matches) :
            $this->isMatch = preg_match($pattern, $subject) === 1;

        return $this->getMatchResult();
    }

    /**
     * Check return type
     * @return array|bool
     */

    private function getMatchResult()
    {
        if ($this->returnMatchResult) {
            return $this->matches;
        } else {
            return $this->isMatch;
        }
    }

    /**
     * Use to toggle $this->returnMatchResult
     * When we use this method if $bool = null $this->returnMatchResult will change to another status
     * if $bool != null $this->returnMatchResult will change to $bool value
     * @param null $bool
     */
    public function toggleMatchResultType($bool = null)
    {
        if (empty($bool)) {
            $this->returnMatchResult = !$this->returnMatchResult;
        } else {
            $this->returnMatchResult = is_bool($bool) ? $bool : (bool)$bool;
        }
    }

    /**
     * Use fix mode or not
     * @param $fixMode
     */
    public function fixMode($fixMode)
    {
        $this->fixMode = $fixMode;
    }

    /**
     * User self regular
     * @param $pattern
     * @param $subject
     * @return bool| array
     */
    public function check($pattern, $subject)
    {
        return $this->regex($pattern, $subject);
    }


    public function checkEmail($subject)
    {
        return $this->regex('email', $subject);
    }

    public function checkChinaTel($subject)
    {
        return $this->regex('mobile', $subject);
    }

    public function checkQQ($subject)
    {
        return $this->regex('qq', $subject);
    }

    public function checkUrl($subject)
    {
        return $this->regex('url', $subject);
    }

    public function checkEnglish($subject)
    {
        return $this->regex('english', $subject);
    }

    public function checkNotNull($subject)
    {
        return $this->regex('require', $subject);
    }

    public function checkUser($max = null, $min = null, $subject)
    {
        if (!empty($max) && !empty($min)) {
            $this->validate['user'] = "/^[a-zA-Z][\w-_]{" . $min . "," . $max . "}$/";
        }
        return $this->regex('user', $subject);
    }

    public function checkPassWord($subject)
    {
        return $this->regex('password',$subject);
    }
}
