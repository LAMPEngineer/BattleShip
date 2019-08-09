<?php

namespace App\GameEngine\Player;


use App\GameEngine\Contracts\PlayerInterface;

class Player1 implements PlayerInterface
{	
	protected $missiles;
    protected $type = 'Player1';

  	/**
     * player have missiles
     * @return int 
     */
	public function getMissiles(): int
	{    
		$this->missiles = config('battleship.player1.missiles');    
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