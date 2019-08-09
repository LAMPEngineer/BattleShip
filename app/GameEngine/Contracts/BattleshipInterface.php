<?php

namespace App\GameEngine\Contracts;

interface BattleshipInterface
{   
    public function getLength(): string;
    public function getBredth(): string;
    public function getLocation(string $player): string;
    public function getHitToSink(): string;
    public function getType(): string;

}