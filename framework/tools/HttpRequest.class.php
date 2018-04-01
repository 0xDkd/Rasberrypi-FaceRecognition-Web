<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/25
 * Time: 下午10:25
 */

namespace framework\tools;


class HttpRequest
{
    //Direction url
    private $url = '';
    //Default return CURL data
    private $is_return = 1;

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->$name;
    }

    /**
     * Set private properties
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    /**
     * Send GET|POST
     * @param null $data
     * @return mixed
     */
    public function send($data = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        if ($this->is_return === 1) {
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            return $result;
        } else {
            curl_exec($curl);
            curl_close($curl);
        }
    }
}