<?php

namespace Domain;
use Exception;

class CasinoGameException extends Exception
{

    public function __construct($message, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
class Player
{
    private $chips;
    private $activeGame;

    function activeGame()
    {
        return $this->activeGame;
    }

    function getAvailableChips()
    {
        return $this->chips;
    }

    function isInGame()
    {
        return $this->activeGame != null;
    }

    function joins($game)
    {
        if ($this->isInGame()) {
            throw new CasinoGameException("Player must leave the current game before joining another game");
        }
        $this->activeGame = $game;
    }

    function leave()
    {
        $this->activeGame->leave();
        $this->activeGame = null;
    }

    function buy($chips)
    {
        if ($chips < 0) {
            throw new CasinoGameException("Buying negative numbers is not allowed");
        }
        $this->chips += $chips;
    }

    function bet($bet)
    {
        if ($bet->getAmount() > $this->chips) {
            throw new CasinoGameException("Can not bet more than chips available");
        }

        $this->chips -= $bet->getAmount();
        $this->activeGame()->addBet($this, $bet);
    }

    function win($chips)
    {
        $this->chips += $chips;
    }

    function lose()
    {

    }
}
class Bet
{
    private $amount;
    private $score;

    /**
     * Bet constructor.
     * @param $amount
     * @param $score
     */
    public function __construct($amount, $score)
    {
        $this->amount = $amount;
        $this->score = $score;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }
}