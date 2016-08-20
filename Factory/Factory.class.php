<?php
namespace Factory;

class Factory
{
    public static function createObj($operate)
    {
        switch ($operate)
        {
            case '+':
                return new OperationAdd();
                break;
            case '-':
                return new OperationSub();
                break;
            case '*':
                return new OperationMul();
                break;
            default :
                return false;
        }
    }
}