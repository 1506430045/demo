<?php
namespace Observer;

class Test implements \Observer\Observerable
{
    public function update()
    {
        echo 'Test' . PHP_EOL;
    }
}