<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/1
 * Time: 下午3:49
 */

namespace admin\controller;


use framework\core\controller;
use framework\core\factory;
use framework\tools\encrypt;
use framework\tools\httprequest;
use framework\tools\Upload;

class apicontroller extends controller
{

    private $statuscode = array(
        '401' => 'token miss',
        '402' => 'time out',
        '403' => 'forbidden',
        '404' => 'not fund',
        '405' => 'authentication failed',
        '406' => 'the parameters are indeed',
        '101' => 'method is illegal',
        '200' => 'success',
        '201' => 'success but not user',
    );
    //Forbidden List
    private $forbiddenList = array(
        //Please write ip
    );


    /**
     * Get post data
     */
    public function getData()
    {
        //TODO:CheckIp

        $input_str = file_get_contents("php://input");
        //var_dump($input_str);
        if (empty($input_str)) {
            return $this->rejectget();
        } else {
            $urldecode_str = urldecode($input_str);
            $data = json_decode($urldecode_str,true);;
            $en = new encrypt();
            $va = $en->encrypt(md5($data['time']), $GLOBALS['config']['en_key']);
            //token failed
            if ($va != $data['token']) {
                $this->showinfo('405');
        }
            //check keys
            $keys = array_keys($data);
            //30s must upload data
            $keys_must = array('user_id', 'user_pic', 'user_name', 'time', 'token', 'status');
            $pa = true;
            foreach ($keys as $key) {
                if (!in_array($key, $keys_must)) {
                    $this->showinfo('406');
                }
            }
            //Check time
            $this->checkTime($data);
            //Check
            //Insert Data
            $this->doinsertdata($data);

        }
    }

    /**
     * Reject Get Method
     */
    private function rejectget()
    {
       $this->showinfo('101');
    }

    /**
     * Insert into Mysql .
     * @param $data
     */
    private function doinsertdata($data)
    {
        $s_model = factory::m('scan');
        //unknow user
        if ($data['user_id'] == 0) {
            $s_data['status'] = 0;
            $s_data['scan_time'] = $data['time'];
            $s_data['scan_pic'] = $data['user_pic'];
            $s_data['user_id'] = 0;
            //insert
            $s_model->insert($s_data);
            //status code
            $this->showinfo('201');
        }
        //true user
        //check user is exist or not
        $u_model = factory::m('registeruser');
        $is_ex = $u_model->checkuser($data['user_id']);
        $s_data['status'] = $data['status'];
        $s_data['scan_time'] = $data['time'];
        $s_data['scan_pic'] = $data['user_pic'];
        $s_data['user_id'] = $data['user_id'];
        //if exist
        if ($is_ex) {
            //insert
            $s_model->insert($s_data);
        } else {
            $s_model = factory::m('scan');
            $u_data['user_name'] = $data['user_name'];
            $u_data['user_id'] = $data['user_id'];
            //insert
            $s_model->insert($s_data);
            $u_model->insert($u_data);
        }
        //Success
        $this->showinfo('200');

    }
    //TODO:FILES

    /**
     * upload file method ,but this method is very dangerous
     */
    public  function getPicture()
    {
        $upload = new Upload();
        $upload->upload_path = UPLOADS_PATH;
        $upload->maxsize = 1000*1024;
        $upload->prefix = 'face';
        $input_str = file_get_contents("php://input");
        $path = $upload->doBinaryUpload($input_str);
    }

    /**
     * Check Time , 1min is the last time
     * @param $data
     */
    private function checkTime($data)
    {
        if (time()-$data['time'] > 60){
            $this->showinfo('402');
        }
    }

    /**
     * Test get Json ,Do not use in real web
     */
    public function makejson()
    {
        $en = new encrypt();
        $va = $en->encrypt(md5(time()), $GLOBALS['config']['en_key']);
        $arr = array(
            'user_id'   => '0',
            'user_pic'  => 'https://xxxxxxxx',
            'user_name' => 'Unknow',
            'time'      => time(),
            'token'     => $va,
            'status'    => '1'
        );
        var_dump($arr);
        $js = json_encode($arr);
        var_dump($js);
        $keys = ['user_id', 'user_pic', 'user_name', 'time', 'token', 'status1'];
        $keys_must = array('user_id', 'user_pic', 'user_name', 'time', 'token', 'status');
        $pa = true;
        $curl = new httprequest();
        $curl->url = 'http://face.test/?m=admin&c=api&a=getdata';
        $result = $curl->send($js);
        var_dump($result);
    }

    /**
     * @desc
     * @param string $code StatusCdoe
     */
    private function showInfo($code)
    {
        die($code.'<br>'.$this->statuscode[$code]);
    }

    /**
     * Get Post Ip
     * @return string
     */
    private  function GetIP()
    {
        if(!empty($_SERVER["HTTP_CLIENT_IP"]))
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        else if(!empty($_SERVER["REMOTE_ADDR"]))
            $cip = $_SERVER["REMOTE_ADDR"];
        else
            $cip = "Can not get post ip";
        return $cip;
    }

}