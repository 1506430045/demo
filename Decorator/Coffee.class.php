<?php
namespace Decorator;

class Coffee extends \Decorator\Beverage
{
    public function __construct()
    {
        $this->_name = 'Coffee';
    }

    public function cost()
    {
        return 1.0;
    }
}