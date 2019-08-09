<?php

namespace App\GameEngine\Contracts;


interface PlayerInterface
{
	public function getMissiles(): int;

	public function getType(): string;

}