<?php

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