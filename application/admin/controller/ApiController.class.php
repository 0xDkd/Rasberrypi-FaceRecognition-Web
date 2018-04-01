<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/4/1
 * Time: 下午3:49
 */

namespace admin\controller;


use framework\core\Controller;
use framework\core\Factory;
use framework\tools\Encrypt;
use framework\tools\HttpRequest;

class ApiController extends Controller
{

    private $statusCode = array(
        '401' => 'Token Miss',
        '402' => 'Time Out',
        '403' => 'Forbidden',
        '404' => 'Not Fund',
        '405' => 'Authentication failed',
        '406' => 'The parameters are indeed',
        '101' => 'Method is illegal',
        '200' => 'Success',
        '201' => 'Success But not user',
    );

    public function getData()
    {
        $inputstr = file_get_contents("php://input");
        if (empty($inputstr)) {
            //return $this->rejectGet();
            var_dump($this->rejectGet());
        } else {
            $urldecodestr = urldecode($inputstr);
            $data = json_decode($urldecodestr,true);;
            var_dump($data);
            $en = new Encrypt();
            $va = $en->encrypt(md5($data['time']), $GLOBALS['config']['en_key']);
            //Token failed
            if ($va != $data['token']) {
                //return $this->statusCode['405'];
                var_dump($this->statusCode['405']);
                return;
        }
            //Check keys
            $keys = array_keys($data);
            //30s Must upload data
            $keys_must = array('user_id', 'user_pic', 'user_name', 'time', 'token', 'status');
            $pa = true;
            foreach ($keys as $key) {
                if (!in_array($key, $keys_must)) {
                    return $this->jstatusCode['406'];
                }
            }
            $this->doInsertData($data);

        }
    }

    private function rejectGet()
    {
        return $this->statusCode['101'];
    }

    public function returnData()
    {

    }

    private function doInsertData($data)
    {
        $s_model = Factory::M('scan');
        //Unknow User
        if ($data['user_id'] == 0) {
            $s_data['status'] = 0;
            $s_data['scan_time'] = $data['time'];
            $s_data['scan_pic'] = $data['user_pic'];
            $s_data['user_id'] = 0;
            //Insert
            $s_model->insert($s_data);
            //Status Code
            return $this->statusCode['201'];
        }
        //True User
        //Check User is exist or not
        $u_model = Factory::M('RegisterUser');
        $is_ex = $u_model->checkUser($data['user_id']);
        $s_data['status'] = $data['status'];
        $s_data['scan_time'] = $data['time'];
        $s_data['scan_pic'] = $data['user_pic'];
        $s_data['user_id'] = $data['user_id'];

        //If exist
        if ($is_ex) {
            //Insert
            $s_model->insert($s_data);
        } else {
            $s_model = Factory::M('scan');
            $u_data['user_name'] = $data['user_name'];
            $u_data['user_id'] = $data['user_id'];
            //Insert
            $s_model->insert($s_data);
            $u_model->insert($u_data);
        }
        return $this->statusCode['200'];

    }

    private function getPicture()
    {

    }

    public function makeJson()
    {
        $en = new Encrypt();
        $va = $en->encrypt(md5(time()), $GLOBALS['config']['en_key']);
        $arr = array(
            'user_id'   => '1',
            'user_pic'  => 'https://xxxxxxxx',
            'user_name' => 'SunWei',
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
        /*foreach ($keys as $key) {
            if (!in_array($key, $keys_must)) {
                var_dump($this->statusCode['406']);
                return $this->statusCode['406'];
            }
        }*/
        $curl = new HttpRequest();
        $curl->url = 'http://face.test/?m=admin&c=api&a=getData';
        $result = $curl->send($js);
        var_dump($result);
    }

    private function showInfo()
    {
        
    }

}