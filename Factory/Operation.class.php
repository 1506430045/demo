<?php
namespace Factory;

abstract class Operation
{
    /**
     * @param $num1
     * @param $num2
     * @return mixed
     */
    abstract public function getValue($num1, $num2);
}