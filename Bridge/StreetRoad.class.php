<?php
namespace Bridge;

class StreetRoad extends \Bridge\Road
{
    function Run()
    {
        $this->icar->run();
        echo ":在乡村街道上。";
    }
}