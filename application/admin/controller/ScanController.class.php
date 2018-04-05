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
            isset($_GET['u_id'])?$fix = "&u_id=".$_GET['u_id'] : $fix = '';
            $this->showActionInfo('警告', '您真的想要删除吗，删除以后数据不可恢复，请慎重', "/?m=admin&c=Scan&a=doScanDelete&scan_id=".$_GET['scan_id'].$fix, '点击删除', 200000);
        } else {
            $this->showActionInfo('请登录', null, '/?c=User&a=loginAction', '登录', 2000);
        }
    }

    public function doScanDelete()
    {
        if ($this->isLogin()) {
            $s_model = Factory::M('Scan');
            $s_model->delete($_GET['scan_id']);
            isset($_GET['u_id'])?$fix = '/?m=admin&c=User&a=userDetail&u_id='.$_GET['u_id'] : $fix = '/?m=admin&c=IllegalScan&a=illegalScanUserDashBroad';
            $this->showActionInfo('删除成功',null,$fix,'返回',2000);
        } else {
            $this->showActionInfo('请登录', null, '/?c=User&a=loginAction', '登录', 2000);
        }


    }
}