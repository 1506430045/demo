<?php
namespace Bridge;

class SpeedRoad extends \Bridge\Road
{
    function run()
    {
        $this->icar->run();
        echo ":在高速公路上。";
    }
}