<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/1/26
 * Time: 17:03
 * 基础模型类，包括数据库的链接初始化
 */

namespace framework\core;

use framework\dao\DAOPDO;

/**
 * Class Model
 * @package framework\core
 * @Author Wei
 * @Desc basic Model
 * @Version 0.5
 * @property object $dao Init DAO
 * @property string $true_table get table name
 * @property string $pk Primary key field
 */
class Model
{
    protected $dao;
    protected $true_table; //TABLE_NAME
    protected $pk;         //PRIMARY_KEY_FIElD

    /**
     * Model constructor.
     * @desc init something
     */
    public function __construct()
    {
        $this->initDAO();
        $this->initTrueTable();
        $this->initField();
    }

    /**
     * @desc Find which Field have Primary_key
     */
    public function initField()
    {
        $sql = "DESC $this->true_table";
        $result = $this->dao->fetchAll($sql);
        //遍历二位数组
        if ($GLOBALS['config']['debug']) {
            echo "----------initFieldMethod------------";
            var_dump($result);
        }
        foreach ($result as $k => $v) {
            if ($v['Key'] == 'PRI') {
                //说明$v['field']为主键字段
                $this->pk = $v['Field'];
            }
        }
    }

    /**
     * @desc init DAO object
     */
    public function initDAO()
    {
        $option = $GLOBALS['config'];
        $this->dao = DAOPDO::getSingleton($option);
    }

    /**
     * @desc Get databases table name
     * @property string $logic_table This property is a child class's property ,when the child class extend father class,this property will become table name
     *
     */
    public function initTrueTable()
    {
        $this->true_table = '`' . $GLOBALS['config']['table_prefix'] . $this->logic_table . '`';

    }

    /**
     * @desc add `` for field name
     * @param array $name
     * @return array
     */
    public function safeManage($name)
    {
        foreach ($name as $k => $v) {
            if (is_array($v)) {
                $name_key = array_values($v);
            } else {
                $name_key = array_values($name);
            }
        }

        $name_str = array_map(function ($v) {
            return "`$v`";
        }, $name_key);
        if ($GLOBALS['config']['debug']) {
            echo "-------------safeManage--------------";
            var_dump($name_str);
        }
        return $name_str;
    }

    //自动插入数据

    /**
     * @desc  auto insert
     * @param $data array
     * array(
     *  'good_name' => 'value',
     *  'store_price' => 999
     * )
     * @return mixed
     */
    function insert($data)
    {
        //拼接SQL语句，最后完成执行
        //$sql = "INSERT INTO `TABLE_NAME` (`goods_name`) VALUES ('inphone7',999) "
        //处理表明字段部分
        $sql = "INSERT INTO $this->true_table";
        $fields = array_keys($data);
        //给元素两端加上``
        $field_list = $this->safeManage($fields);
        //重新拼接数组，完成字段的拼接
        $field_list = '(' . implode(',', $field_list) . ')';
        $sql .= $field_list;

        //拼接VALUES部分
        $field_value = array_values($data);
        //插入数据前，将引号转义并且包裹一下
        $field_value = array_map(array($this->dao, "quote"), $field_value);
        $field_value = implode(',', $field_value);
        $sql .= 'VALUES (' . $field_value . ')';
        if ($GLOBALS['config']['debug']) {
            echo "----------insertMethod-------------";
            var_dump($sql);
        }
        //执行SQL语句，并且返回主键的值
        $this->dao->exec($sql);
        return $this->dao->lastInsertId();
    }

    /**
     * @desc auto delete
     * @param $id int
     * @return mixed
     */
    public function delete($id)
    {
        //$sql = "DELETE FROM `TABLE_NAME` WHERE PRIMARY_KEY_FIELD=$id "

        $sql = "DELETE FROM $this->true_table WHERE $this->pk=$id";
        if ($GLOBALS['config']['debug']) {
            echo "----------deleteMethod-------------";
            var_dump($sql);
        }
        return $this->dao->exec($sql);
    }

    /**
     * @desc auto update
     * @param array $data
     * @param array $where
     * @return mixed
     */
    public function update($data, $where = null)
    {
        //$sql = "UPDATE `TABLE_NAME` SET `FIELD_NAME1`='VALUE1' , `FIElD_NAME2`='VALUE2' WHERE `FIElD_NAME`='FIELD_VALUE' "
        //if where is null stop
        if (empty($where)) {
            return false;
        } else {
            $where_str = '';
            foreach ($where as $k => $v) {
                $where_str = "WHERE `$k` = '$v'";
            }
        }
        //处理key值
        $fields = array_keys($data);
        $fields = array_map(function ($v) {
            return "`$v`";
        }, $fields);
        //处理value值
        $fields_value = array_values($data);
        $fields_value = array_map(array($this->dao, 'quote'), $fields_value);
        //进行拼接
        $str = '';
        foreach ($fields as $k => $v) {
            $str .= "$v=$fields_value[$k],";
        }
        //去除最后一个,
        $str = rtrim($str, ',');
        $sql = "UPDATE $this->true_table SET $str $where_str";
        if ($GLOBALS['config']['debug']) {
            echo "----------updateMethod-------------";
            var_dump($sql);
            var_dump($fields);
        }
        return $this->dao->exec($sql);
    }

    /**
     * @desc auto manage select sql
     * @param array $data
     * @param array $where
     * @param int $count
     * @return mixed
     */
    public function find($data = null, $where = null, $count = null)
    {
        //$sql = "SELECT `FIELD_NAME ` FROM `TABLE_NAME` WHERE `FIELD` = 'ID' "
        //1.先判断是否又字段
        if (empty($data)) {
            $field = '*';
            if ($count != null) {
                $field = 'count(*) AS total';
            }
        } else {
            $field = $this->safeManage($data);
            $field = implode(',', $field);
        }
        //2.确定查询的条件
        if (empty($where)) {
            $sql = "SELECT $field FROM $this->true_table";
            return $this->dao->fetchAll($sql);
        } else {
            $where_str = '';
            foreach ($where as $k => $v) {
                $where_str = "`$k` = '$v'";
            }
            $sql = "SELECT $field FROM $this->true_table WHERE $where_str";
            if ($GLOBALS['config']['debug']) {
                echo "----------findMethod-------------";
                var_dump($sql);
            }
            return $this->dao->fetchall($sql);
        }
    }

    /**
     * 当只使用一个参数时，请让键的值是最主要的查询表，否者将不能正常使用
     * $select_data = [
     *  '表名'     => '需要获得的字段名称'
     *  'question' => '*',
     *  'category' => 'cat_id',
     *  'user'     => 'user_id'
     * ];
     *
     * 当使用连个参数的时候，请直接在$where中填写最主要查询的表，$select_data可以随意填写
     *
     * $select_data = [
     *  'question' => '*',
     *  'category' => 'cat_id,cat_name',
     *  'user' => 'user_id,user_pic,user_name',
     * ];
     * $where = [
     *  'main' => 'question', //main中请添写查询的主表，必须有main这一个键！
     *  'category' => 'cat_id',
     *  'user' => 'user_id'
     * ];
     *
     *
     *
     */
    /**
     * @desc
     * @param $select_data
     * @param array $where
     * @param string $limit
     * @param int $offset
     * @return mixed
     */

    public function joinFind($select_data, $where = null, $limit = null, $offset = null)
    {
        //The Complete sql
        //$sql =SELECT ask_question.*,ask_category.cat_id,ask_category.cat_name,ask_user.user_id,ask_user.user_name FROM `ask_question` AS `ask_question`  LEFT JOIN `ask_category` AS `ask_category` ON ask_question.cat_id=ask_category.cat_id LEFT JOIN `ask_user` AS `ask_user` ON ask_question.user_id=ask_user.user_id
        if ($where != null) {
            static $more_value = array();
            $i = 1;
            $str = '';
            //Unset some array key&value and create a new array
            foreach ($select_data as $k => &$v) {
                if (strchr($v, ',')) {
                    $more_value[$k] = explode(',', $v);
                    unset($select_data[$k]);
                }
            }
            //处理只查询一个的表
            foreach ($select_data as $k => $v) {
                $select_head_arr[] = $GLOBALS['config']['table_prefix'] . "$k.$v";
            }
            //处理查询多个的表
            foreach ($more_value as $k => $v) {
                foreach ($v as $key => $value) {
                    $more_value[] = $GLOBALS['config']['table_prefix'] . "$k.$value";
                    unset($more_value[$k]);
                }
            }
            $select_str = implode(',', $select_head_arr) . ',' . implode(',', $more_value);
            //处理JOIN和ON部分
            foreach ($where as $k => $v) {
                if ($k != 'main') {
                    $where[$GLOBALS['config']['table_prefix'] . "$k"] = $v;
                    unset($where[$k]);
                }
            }
            $field_key = array_keys($where);
            $field_value = array_values($where);
            $main_table = $GLOBALS['config']['table_prefix'] . $where['main'];
            unset($where['main']);
            //拼接JOIN和ON部分
            foreach ($where as $k => $v) {
                $str .= " LEFT JOIN `$k` AS `$k` ON $main_table.$field_value[$i]=$field_key[$i].$field_value[$i]";
                $i++;
            }
            $sql = "SELECT $select_str FROM `$main_table` AS `$main_table` $str";
        } else {
            static $select_arr = array();
            static $select_new = array();
            foreach ($select_data as $k => $v) {
                $select_arr[] = $GLOBALS['config']['table_prefix'] . "$k.$v";
                $select_new[$GLOBALS['config']['table_prefix'] . "$k"] = $v;
            }
            var_dump($select_data);
            $select_str = implode(',', $select_arr);
            $str = '';
            $field_key = array_keys($select_new);
            $field_value = array_values($select_new);
            unset($select_new[$field_key['0']]);
            $i = 1;
            foreach ($select_new as $k => $v) {
                $str .= " LEFT JOIN `$k` AS `$k` ON $field_key[0].$field_value[$i]=$field_key[$i].$field_value[$i]";
                $i++;
            }
            $sql = "SELECT $select_str FROM `$field_key[0]` AS `$field_key[0]` $str";
        }
        if ($limit != null) {
            $sql .= " LIMIT $offset,$limit";
        }

        if ($GLOBALS['config']['debug']) {
            echo "----------JoinFindMethod-------------";
            var_dump($sql);
        }
        return $this->dao->fetchall($sql);
    }
}

