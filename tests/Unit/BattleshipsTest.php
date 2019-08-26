<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\GameEngine\Battleship\{BattleshipP, BattleshipQ};
use App\GameEngine\Player\{Player1, Player2};

class BattleshipsTest extends TestCase
{

	/** @test */
	public function that_we_can_get_the_battleships_location_for_players(): void
	{		
		$battleshipP = new BattleshipP;
		$battleshipQ = new BattleshipQ;
		$player1 = new Player1;
		$player2 = new Player2;


		$this->assertEquals($battleshipP->getLocation($player1->getType()),'D3');

		$this->assertEquals($battleshipP->getLocation($player2->getType()),'C2');

		$this->assertEquals($battleshipQ->getLocation($player1->getType()),'A0');

		$this->assertEquals($battleshipQ->getLocation($player2->getType()),'B1');
	}

}