<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\GameEngine\BattleshipGame;
use App\GameEngine\Battleship\BattleshipP;

class BattleshipGameTest extends TestCase
{

	/** @test */
	public function can_be_created_from_valid_strings(): void
	{
		$this->assertInstanceOf(
			BattleshipGame::class,
			BattleshipGame::initCustomGame($rows='E', $columns=5, $startPintP='D3', $startPintQ='A0')
		);
	}

}