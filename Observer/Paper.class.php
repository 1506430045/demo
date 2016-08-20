<?php
namespace Observer;

class Paper
{
    private $_observers = [];

    public function register($sub)
    {
        $this->_observers[] = $sub;
    }

    public function trigger()
    {
        if (!empty($this->_observers))
        {
            foreach ($this->_observers as $observer) {
                $observer->update();
            }
        }
    }
}