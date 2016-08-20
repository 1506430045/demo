<?php
namespace Factory;

class OperationSub extends \Factory\Operation
{
    public function getValue($num1, $num2)
    {
        return $num1 - $num2;
    }
}