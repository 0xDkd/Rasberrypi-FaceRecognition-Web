<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/2
 * Time: 下午10:08
 */

namespace admin\model;


use framework\core\Model;

class UserModel extends Model
{
    protected $logic_table = 'admin';
    public function getInfo($user)
    {
        $where['name'] = $user;
        $data = $this->find(null,$where);
        return $data;
    }

}