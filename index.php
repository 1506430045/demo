<?php
define('BASE_DIR', __DIR__);
include BASE_DIR . '/Lib/Loader.php';
spl_autoload_register('\\Lib\\Loader::autoload');

if (\Lib\Functions::isCli()) {  //cli模式
    array_shift($argv);
    $func = array_pop($argv);
    $namespace = implode('\\', $argv);
    $namespace = '\\' . $namespace;
    $obj = new $namespace();
    $obj->$func();
} else {

}

//$conn_args = array(
//    'host' => '127.0.0.1',
//    'port' => '5672',
//    'login' => 'guest',
//    'password' => 'guest',
//    'vhost' => '/'
//);
//$test = new \Mq\Test($conn_args);
//$test->send();
//$test->receive();