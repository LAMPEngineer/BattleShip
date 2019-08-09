<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\GameEngine\BattleshipGame;
use App\GameEngine\Player;

class GameController extends Controller
{
	//
    public function index()
    {   
        if(isset($_SESSION))
        {
            session_destroy();
        }

    try {

            $battle_area_col = config('battleship.battle_area.col');
            $battle_area_row = $this->parseRow(config('battleship.battle_area.row'));
            $startPintP1 = config('battleship.player1.battleship_P.location');
            $startPintQ1 = config('battleship.player1.battleship_Q.location');
            $startPintP2 = config('battleship.player2.battleship_P.location');
            $startPintQ2 = config('battleship.player2.battleship_Q.location');

            $game1 = $this->getGame($battle_area_row, $battle_area_col, $startPintP1, $startPintQ1);
            $game2 = $this->getGame($battle_area_row, $battle_area_col, $startPintP2, $startPintQ2);          


        } catch (Exception $e) {

            report($e);     

        }

      
   
        return view('game', [
            'layout1' => $game1->generateGameLayoutWithShips(),
            'message1' => '# Ships position 1 #',
            'messageWin1' => '',
            'layout2' => $game2->generateGameLayoutWithShips(),
            'message2' => '# Ships position 2 #',
            'messageWin2' => '',
        ]);

    }

    /**
     * Register hit for player 1
     *  POST /  HTTP/1.1
     * @return string
     */
    public function postIndex1(Request $request)
    {

    try {
            $position = $request->input('pos');

            $battle_area_col = config('battleship.battle_area.col');
            $battle_area_row = $this->parseRow(config('battleship.battle_area.row'));

            $startPintP1 = config('battleship.player1.battleship_P.location');
            $startPintQ1 = config('battleship.player1.battleship_Q.location');

            $game = $this->getGame($battle_area_row, $battle_area_col, $startPintP1, $startPintQ1);

            $message = ''; $messageWin = '';
            if ($position === 'show') {
                $layout = $game->generateRevealedGameLayout();
            } else {
                $message = $game->registerShot($position);
                $_SESSION['shots']++; // Increase number of shots fired

                if ($game->allShipsSunk()) {
                    $messageWin = 'Well done! You completed the game.';
                }

                $layout = $game->generateGameLayout();
                // Board layout changed so we must save it
                $_SESSION['layout'] = $game->getBoardLayout();
            }
            
        } catch (Exception $e) {

            report($e);
            
        }
        
  

    return view('game1', [
            'layout' => $layout,
            'message' => $message,
            'messageWin' => $messageWin,
        ]);
    }

    /**
     * Register hit for player 2
     *  POST /  HTTP/1.1
     * @return string
     */
    public function postIndex2(Request $request)
    {

    try {
            $position = $request->input('pos');

            $battle_area_col = config('battleship.battle_area.col');
            $battle_area_row = $this->parseRow(config('battleship.battle_area.row'));

            $startPintP2 = config('battleship.player2.battleship_P.location');
            $startPintQ2 = config('battleship.player2.battleship_Q.location');

            $game = $this->getGame($battle_area_row, $battle_area_col, $startPintP2, $startPintQ2);

            $message = ''; $messageWin = '';
            if ($position === 'show') {
                $layout = $game->generateRevealedGameLayout();
            } else {
                $message = $game->registerShot($position);
                $_SESSION['shots']++; // Increase number of shots fired

                if ($game->allShipsSunk()) {
                    $messageWin = 'Well done! You completed the game.';
                }

                $layout = $game->generateGameLayout();
                // Board layout changed so we must save it
                $_SESSION['layout'] = $game->getBoardLayout();
        }
            
        } catch (Exception $e) {

            report($e);
            
        }   
        
   

    return view('game2', [
            'layout' => $layout,
            'message' => $message,
            'messageWin' => $messageWin,
        ]);
    }

    /**
     * Reset game
     *  POST /reset  HTTP/1.1
     */
    public function postReset()
    {
        session_destroy();
        //header('Location: /paly');
        return redirect('play');
    }


    /**
     * Get game instance
     *
     * @return BattleshipGame
     */
    private function getGame($rows=10, $cols=10, $startPintP='', $startPintQ='')
    { 

    try {
            if (!isset($_SESSION['layout'])) {
                // Start new game
                //$game = BattleshipGame::initCustomGame(10, 10);
                $game = BattleshipGame::initCustomGame($rows, $cols, $startPintP, $startPintQ);
                $_SESSION['layout'] = $game->getBoardLayout();
                $_SESSION['shots'] = 0; // Shots fired counter
            } else {
                $game = BattleshipGame::resumeGame($_SESSION['layout']);
            }
               
       } catch (Exception $e) {
           report($e);
       }  
        return $game;
    }

   
    /**
     * Pares alphabate to corresponding integer
     * 		
     * @param  string $strRow - Row in letter formate
     * @return int         corresponding integer number
     */
    private function parseRow(string $strRow):int
    {
    	// Get number from letter (0 based)
        // i.e. A = 1, B = 2, C = 3, etc.
        $row = ord(strtolower($strRow)) - 96;

        return $row;
    }
}
