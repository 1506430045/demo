<?php
namespace Strategy;

class FlyWithWings implements \Strategy\FlyBehavior
{
    public function fly()
    {
        echo "Fly With Wings \n";
    }
}