<?php

namespace App\GameEngine\Battleship;

class Ship
{
    protected $length;
    protected $type;
    protected $location;

    /**
     * @return int Length of the ship
     */
    public function getLength()
    {
        return $this->length;
    }


    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getLocation(string $player)
    {
        return $this->location;
    }


}
