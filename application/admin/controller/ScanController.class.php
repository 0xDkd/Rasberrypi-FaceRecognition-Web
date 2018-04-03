<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/3
 * Time: 下午9:47
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;

class ScanController extends Controller
{
    public function showDelete()
    {
        if ($this->isLogin()) {
            $this->showActionInfo('警告', '您真的想要删除吗，删除以后数据不可恢复，请慎重', "/?m=admin&c=scan&a=doScanDelete&scan_id=".$_GET['scan_id']."&u_id=".$_GET['u_id'], '点击删除', 200000);
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function doScanDelete()
    {
        if ($this->isLogin()) {
            $s_model = Factory::M('Scan');
            $s_model->delete($_GET['scan_id']);
            $this->showActionInfo('删除成功',null,'/?m=admin&c=user&a=userDetail&u_id='.$_GET['u_id'],'返回',2000);
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }


    }
}