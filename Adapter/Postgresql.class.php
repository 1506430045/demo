<?php
namespace Adapter;

class Postgresql implements \Adapter\IDatabase
{
    protected $connect;

    public function connect($host, $username, $password, $database)
    {
        $this->connect = pg_connect("host=$host dbname=$database user=$username password=$password");
        //...
    }

    public function query($sql)
    {
        //...
    }
}