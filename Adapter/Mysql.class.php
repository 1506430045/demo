<?php
namespace Adapter;

class Mysql implements \Adapter\IDatabase
{
    protected $connect;

    public function connect($host, $username, $password, $database)
    {
        $connect = mysql_connect($host, $username, $password, $database);
        mysql_select_db($database, $connect);
        $this->connect = $connect;
        //...
    }

    public function query($sql)
    {
        //...
    }
}