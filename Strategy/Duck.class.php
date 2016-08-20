<?php
namespace Strategy;

class Duck
{
    private $_flyBehavior;

    public function performFly()
    {
        $this->_flyBehavior->fly();
    }

    public function setFlyBehavior(FlyBehavior $behavior)
    {
        $this->_flyBehavior = $behavior;
    }
}