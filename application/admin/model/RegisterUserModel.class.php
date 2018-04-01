<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/1
 * Time: 下午5:45
 */

namespace admin\model;


use framework\core\Model;

class RegisterUserModel extends Model
{
    protected $logic_table = 'register_user';
    public function checkUser($user_id)
    {
        $where['user_id'] = $user_id;
        $user = $this->find(null,$where);
        if (empty($user)){
            return false;
        }else{
            return true;
        }
    }
}