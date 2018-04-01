<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/22
 * Time: 下午7:14
 */

namespace framework\tools;


class Encrypt
{
    /**
     * Encrypt data
     * @param  int|string $data  data
     * @param int |string $key  Encrypt key
     * @return string Encryption string
     */
    public function encrypt($data, $key)
    {
        $char = '';
        $str = '';
        $key = md5($key);
        $x = 0;
        $len = strlen($data);
        $l = strlen($key);
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= $key{$x};
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            $str .= chr(ord($data{$i}) + (ord($char{$i})) % 256);
        }
        return base64_encode($str);
    }

    /**
     * Decrypt data
     * @param string|int $data Decryption Data
     * @param  string |int $key Decryption data
     * @return string data
     */
    public function decrypt($data, $key)
    {
        $char = '';
        $str = '';
        $key = md5($key);
        $x = 0;
        $data = base64_decode($data);
        $len = strlen($data);
        $l = strlen($key);
        for ($i = 0; $i < $len; $i++) {
            if ($x == $l) {
                $x = 0;
            }
            $char .= substr($key, $x, 1);
            $x++;
        }
        for ($i = 0; $i < $len; $i++) {
            if (ord(substr($data, $i, 1)) < ord(substr($char, $i, 1))) {
                $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
            } else {
                $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
            }
        }
        return $str;
    }
}