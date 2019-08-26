<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\GameEngine\Player\{Player1, Player2};

class PlayerTest extends TestCase
{
	protected $player1;
	protected $player2;

	public function setUp(): void
	{		
		$this->player1 = new Player1;
		$this->player2 = new Player2;

	}


	/** @test */
	public function that_we_can_get_the_players_have_missiles(): void
	{		
		parent::setUp();
		$this->assertEquals($this->player1->getMissiles(),4);
		$this->assertEquals($this->player2->getMissiles(),15);
	}

	/** @test */
	public function that_we_can_get_the_players_type(): void
	{		
		$this->assertEquals($this->player1->getType(),'Player1');
		$this->assertEquals($this->player2->getType(),'Player2');
	}

}
