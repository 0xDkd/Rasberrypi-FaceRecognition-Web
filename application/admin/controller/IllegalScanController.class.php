<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/4
 * Time: 下午2:27
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Page;

class IllegalScanController extends Controller
{
    public function illegalScanUserDashBroad()
    {
        if ($this->isLogin()) {
            $s_model = Factory::M('Scan');

            $page = new Page();
            $illegal_scans_num = $page->total_pages = $s_model->getIllegalScanCount();

            //How many data in one page
            $page->url = '/?m=admin&c=illegalScan&a=illegalScanUserDashBroad&';
            $page->pagesize = $GLOBALS['config']['page_limit'];
            //Now page
            $page->now_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page->now_page - 1) * $page->pagesize;
            $limit = $page->pagesize;
            //Get All Illegal Scan Info
            $illegal_scans = $s_model->getIllegalScan($offset, $limit);
            $page_bar = $page->create();
            $this->smarty->assign('illegal_scans', $illegal_scans);
            $this->smarty->assign('illegal_num', $illegal_scans_num);
            $this->smarty->assign('page_bar', $page_bar);
            $this->smarty->display('illegal/illegal.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }

    public function illegalScanDetail()
    {
        if ($this->isLogin()) {
            $s_model = Factory::M('Scan');
            $detail = $s_model->getIllegalScanDetail($_GET['s_id']);
            $this->smarty->assign('detail',$detail[0]);
            $this->smarty->display('illegal/illegal_detail.html');
        } else {
            $this->showActionInfo('请登录', null, '/?c=user&a=loginAction', '登录', 2000);
        }
    }
}