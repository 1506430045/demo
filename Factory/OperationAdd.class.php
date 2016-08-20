<?php
namespace Factory;

class OperationAdd extends \Factory\Operation
{

    /**
     * @param $num1
     * @param $num2
     * @return mixed
     */
    public function getValue($num1, $num2)
    {
        return $num1 + $num2;
    }
}