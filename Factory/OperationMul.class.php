<?php
namespace Factory;

class OperationMul extends \Factory\Operation
{
    public function getValue($num1, $num2)
    {
        return $num1 * $num2;
    }
}