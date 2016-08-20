<?php
namespace Observer;

class Subscriber implements Observerable
{
    public function update()
    {
        echo "Subscriber" . PHP_EOL;
    }
}