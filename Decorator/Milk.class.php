<?php
namespace Decorator;

class Milk extends CondimentDecorator
{
    public $_beverage;

    public function __construct($beverage)
    {
        parent::__construct();
        $this->_name = 'Milk';
        if ($beverage instanceof \Decorator\Beverage)
        {
            $this->_beverage = $beverage;
        }
        else
        {
            exit('Failure');
        }
    }

    public function cost()
    {
        return $this->_beverage->cost() + 0.2;
    }
}