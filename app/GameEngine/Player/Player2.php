<?php

namespace App\GameEngine\Player;


use App\GameEngine\Contracts\PlayerInterface;

class Player2 implements PlayerInterface
{	
	protected $missiles;
    protected $type = 'Player2';

    /**
     * player have missiles
     * @return int 
     */
	public function getMissiles(): int
	{    
		$this->missiles = config('battleship.player2.missiles');    
		return $this->missiles;
	}

    /**
     * player type
     * @return string 
     */
    public function getType(): string
    {       
        return $this->type;
    }

}