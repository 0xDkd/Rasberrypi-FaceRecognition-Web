<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/1
 * Time: 下午7:19
 */

namespace admin\model;


use framework\core\Model;

class ScanModel extends Model
{
    protected $logic_table = 'scan';

    public function getScanNum($user_id)
    {
        $sql = "SELECT COUNT(user_id) AS scan_num FROM `face_scan` WHERE user_id=$user_id";
        $data = $this->dao->fetchAll($sql);
        return $data[0]['scan_num'];
    }

    public function getIllegalScan($offset,$limit)
    {
        $sql = "SELECT * FROM `face_scan` WHERE user_id=0 LIMIT $offset,$limit";
        return $this->dao->fetchAll($sql);
    }

    public function getIllegalScanCount()
    {
        $sql = "SELECT count(user_id) AS illegal_num FROM `face_scan` WHERE user_id=0";
        $data = $this->dao->fetchAll($sql);
        return $data[0]['illegal_num'];
    }

    public function getIllegalScanDetail($s_id)
    {
        $where['scan_id'] = $s_id;
        return $this->find(null,$where);
    }

}