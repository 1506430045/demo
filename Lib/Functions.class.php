<?php
namespace Lib;

class Functions
{
    public static function isCli()
    {
        return php_sapi_name() == 'cli';
    }
}