<?php
namespace Strategy;

class FlyWithNo implements \Strategy\FlyBehavior
{
    public function fly()
    {
        echo "Fly With No Wings \n";
    }
}