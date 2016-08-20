<?php
namespace Adapter;

interface IDatabase
{
    public function connect($host, $username, $password, $database);

    public function query($sql);
}