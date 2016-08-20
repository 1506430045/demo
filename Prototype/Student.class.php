<?php
namespace Prototype;

class Student implements Prototype
{
    protected $name;
    protected $sex;
    protected $age;

    public function __construct($name, $sex, $age)
    {
        $this->name = $name;
        $this->sex = $sex;
        $this->age = $age;
    }

    public function sayHello()
    {
        echo "Hello, my name is {$this->name}\n";
    }

    public function copy()
    {
        return clone $this;
    }
}