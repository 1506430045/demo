<?php
namespace Decorator;

class CondimentDecorator extends \Decorator\Beverage
{
    public function __construct()
    {
        $this->_name = 'Condiment';
    }

    public function cost()
    {
        return 0.1;
    }
}