<?php
/**
 * Created by aimer.
 * User: aimer
 * Date: 2018/1/27
 * Time: 15:24
 * Auto load | Initialize Const | Load Config options
 */

namespace framework\core;
class Framework
{
    /**
     * Framework constructor.
     */
    public function __construct()
    {
        //Initialize const
        $this->initConst();
        //Initialize autoload function
        $this->autoload();
        //Initialize Config options
        $frame_config = $this->loadFrameworkConfig();
        $common_config = $this->loadCommonConfig();
        $GLOBALS['config'] = array_merge($frame_config, $common_config);
        //Initialize MCA
        $this->iniMCA();
        $module_config = $this->loadModuleConfig();
        //Set Config GLOBALS Array
        $GLOBALS['config'] = array_merge($GLOBALS['config'], $module_config);
        //Initialize controller directory and instantiate controller
        $this->dispatch();
        if ($GLOBALS['config']['web_const']) {
            $this->webConst();
        }
    }

    /**
     * Initialize Const
     */
    private function initConst()
    {
        //root directory
        define('ROOT_PATH', str_replace('\\', '/', getcwd() . '/'));
        //application direction
        define('APP_PATH', ROOT_PATH . 'application/');
        //framework direction
        define('FRAMEWORK_PATH', ROOT_PATH . 'framework/');
        //public path
        define('PUBLIC_PATH', '/application/public/');
        //Web domain
        define("WEB_LINK", $_SERVER['SERVER_NAME']);
        //upload path
        define("UPLOADS_PATH", './application/public/uploads/');
        //Thumb path
        define("THUMB_PATH", './application/public/thumb/');
        //Font path
        define("FONT_PATH", './application/public/fonts/');
        //Static_vendor
        define("STATIC_PATH",'./application/public/static');
    }

    public function autoload()
    {
        /**
         * This function if in the oop ,it's parameter will become an array.
         * The first parameter must be a object we often use $this,and the second parameter
         * should be callback function name.
         */
        spl_autoload_register(array($this, "autoloader"));

    }

    /**
     * Call back function  Auto load class
     * @param $class_name
     */
    public function autoloader($class_name)
    {
        if ($class_name == 'Smarty') {
            require_once './framework/vendor/smarty/libs/Smarty.class.php';
            return;
        }
        //1.Make class name to array
        $arr = explode('\\', $class_name);
        //2.Size up directory
        if ($arr[0] == 'framework') {
            $base_path = './';
        } else {
            $base_path = './application/';
        }
        //3.
        $sub_path = str_replace('\\', '/', $class_name);

        //4.Confirm file name , Class or interface
        if (substr($arr[count($arr) - 1], 0, 2) == 'I_') {
            $fix = '.interface.php';
        } else {
            $fix = '.class.php';
        }
        $class_file = $base_path . $sub_path . $fix;
        //5.load Class
        if (file_exists($class_file)) {
            require_once $class_file;
        }
    }

    /**
     *Initialize MCA
     */
    public function iniMCA()
    {
        //Admin or home
        $m = isset($_GET['m']) ? $_GET['m'] : $GLOBALS['config']['default_module'];
        //define const
        define('MODULE', $m);
        //Which Controller
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];
        define('CONTROLLER', $c);
        //Use which method
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
        define('ACTION', $a);
    }

    /**
     * Instantiate  Controller object
     */
    public function dispatch()
    {
        $controller_name = MODULE . '\controller\\' . CONTROLLER . 'Controller';
        //Instantiate object
        $controller = new $controller_name;

        //Use method
        $a = ACTION;
        $controller->$a();

    }

    /**
     * Load FrameworkConfig options
     * @return mixed
     */
    private function loadFrameworkConfig()
    {
        $config_file = FRAMEWORK_PATH . 'config/config.php';
        return require_once $config_file;

    }

    /**
     * Load CommonConfig options
     * @return array|mixed
     */
    private function loadCommonConfig()
    {
        $config_file = './application/common/config/config.php';
        //echo $config_file;
        if (file_exists($config_file)) {
            return require_once $config_file;
        } else {
            return array();
        }
    }

    /**
     * Load ModuleConfig options
     * @return array|mixed
     */
    private function loadModuleConfig()
    {
        $config_file = APP_PATH . MODULE . 'config/config.php';
        if (file_exists($config_file)) {
            return require_once $config_file;
        } else {
            return array();
        }
    }

    private function dataCheck()
    {
        echo '<br>****************<pre>';
        $info = [
            'Const'           => [
                'MODULE'         => MODULE,
                'CONTROLLER'     => CONTROLLER,
                'ACTION'         => ACTION,
                'ROOT_PATH'      => ROOT_PATH,
                'APP_PATH'       => APP_PATH,
                'FRAMEWORK_PATH' => FRAMEWORK_PATH
            ],
            'Function Return' => [
            ]
        ];

        var_dump($info);
    }

    private function webConst()
    {
        define('WEB_NAME', $GLOBALS['config']['web_name']);
        define("WEB_LOGO", $GLOBALS['config']['web_logo']);
        define("WEB_ICO", $GLOBALS['config']['web_ico']);
    }


}