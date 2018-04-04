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

    public function getNum()
    {
        //认证人数
        $sql = "SELECT count(rg.user_id) AS user_num FROM face_register_user AS rg";
        $num[] = $this->dao->fetchRow($sql);
        //扫描次数
        $sql = "SELECT COUNT(s.scan_id) AS scan_num FROM face_scan AS s";
        $num[] = $this->dao->fetchRow($sql);
        //成功扫描次数
        $sql = "SELECT COUNT(s.scan_id) AS scan_right_num FROM face_scan AS s WHERE `user_id` !=0";
        $num[] = $this->dao->fetchRow($sql);
        //非法扫描次数，减去即可
        $re_num =array(
            'user_num' =>$num[0]['user_num'],
            'scan_num' =>$num[1]['scan_num'],
            'scan_right_num' => $num[2]['scan_right_num'],
            'scan_ban_num' => $num[1]['scan_num']-$num[2]['scan_right_num']
        );
        return $re_num;
    }

    public function getAllUserInfo($offset,$limit)
    {
        $sql = "SELECT ru.*,COUNT(s.user_id) AS scan_num FROM  `face_scan` AS s LEFT JOIN `face_register_user` AS ru ON s.user_id=ru.user_id WHERE s.user_id!=0 GROUP BY ru.user_id ORDER BY s.user_id LIMIT $offset,$limit";
        return $this->dao->fetchAll($sql);

    }

    public function getUserCount()
    {
        $data =  $this->find(null,null,true);
        return $data[0]['total'];
    }

    public function getUserDetail($user_id)
    {
        $sql ="SELECT ru.user_name AS user_name,s.scan_pic AS  pic,s.`scan_time` AS time,s.scan_id,ru.user_id FROM `face_register_user` AS ru LEFT JOIN `face_scan` AS s ON  ru.`user_id`= s.`user_id`  where ru.`user_id`=$user_id ORDER BY time";
        return $this->dao->fetchAll($sql);
    }

    public function getUserScanCount($user_id)
    {
        $sql ="SELECT COUNT(ru.user_id) AS scan_num FROM `face_register_user` AS ru LEFT JOIN `face_scan` AS s ON  ru.`user_id`= s.`user_id`  where ru.`user_id`=$user_id";
        return $this->dao->fetchAll($sql);
    }

/*    public function getUserOtherInfo()
    {
        $sql = "SELECT "
    }*/
}