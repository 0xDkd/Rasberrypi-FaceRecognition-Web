<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/2
 * Time: 下午4:35
 */

namespace home\model;


use framework\core\Model;
use framework\tools\Encrypt;

class UserModel extends Model
{
    protected $logic_table = 'admin';

    /**
     * Check repeat email & user_name
     * @param $user_name
     * @param $email
     * @return bool
     */
    public function checkRepeatUser($user_name, $email)
    {
        $where['email'] = $email;
        $e_repeat = $this->find(null, $where);
        unset($where);
        $where['name'] = $user_name;
        $u_repeat = $this->find(null, $where);
        if ($GLOBALS['config']['debug']) {
            var_dump($u_repeat);
            var_dump($e_repeat);
        }
        if (empty($e_repeat) && empty($u_repeat)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Make user active
     * @param $user_name
     * @return mixed
     */
    public function makeActive($user_name)
    {
        $where['name'] = $user_name;
        $data['is_active'] = 1;
        return $this->update($data,$where);
    }

    /**
     * Check user active is correct or not
     * @param $code
     * @param $user
     * @return bool
     */
    public function checkCode($code,$user)
    {
        $where['active_code'] = $code;
        $data = $this->find(null,$where);
        if ($data[0]['name'] == $user){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Check user password & user_name
     * @param $user_name
     * @param $pwd
     * @return bool
     */
    public function loginCheck($user_name,$pwd)
    {
        $where['name'] = $user_name;

        $data = $this->find(null,$where);
        if (empty($data)){
            return false;
        }else{
            if ($data[0]['password'] == $pwd){
                return true;
            }else{
                return false;
            }
        }

    }

   // public function
}

