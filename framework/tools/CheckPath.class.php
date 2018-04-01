<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/3/20
 * Time: 下午9:18
 */

namespace framework\tools;


class CheckPath
{
    public $_path;

    public function checkPath()
    {
        if (file_exists($this->_path)) {
            var_dump($this->_path);
        } else {
            echo 'Error,file not exists!';
            var_dump($this->_path);

        }
    }
}