<?php

namespace App\GameEngine\Battleship;

use App\GameEngine\Contracts\BattleshipInterface;
use App\GameEngine\Battleship\Ship;

class BattleshipQ extends Ship implements BattleshipInterface
{
    protected $length;
    protected $bredth;   
    protected $location;
    protected $hit_to_sink;
    protected $type = 'Q';

    /**
     * @return string
     */
    public function getLength(): string
    {   
        $this->length = config('battleship.battleship_Q.dimension.rows');
        return $this->length;
    }
    /**
     * @return string
     */
    public function getBredth(): string
    {       
        $this->bredth = config('battleship.battleship_Q.dimension.cols');
        return $this->bredth;
    }
    /**   
     * @param  string $player 
     * @return location         
     */
    public function getLocation(string $player): string
    {
        $location = '';        
        if($player=='Player1'){
            $location = config('battleship.player1.battleship_Q.location');
        }elseif ($player=='Player2') {
            $location = config('battleship.player2.battleship_Q.location');
        }else{
            $location = 'Location Incorrect';
        }

        return $this->location = $location;        
    }

    /**
     * @return string
     */
    public function getHitToSink(): string
    {
        $this->hit_to_sink = config('battleship.battleship_Q.hit_to_sink');
        return $this->hit_to_sink;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}