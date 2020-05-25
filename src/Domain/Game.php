<?php

class RollDiceGame
{

    private $playersBets = array();

    function addBet($player, $bet)
    {
        array_push($this->playersBets, array('player' => $player, 'bet' => $bet));
    }

    function play()
    {
        $winningScore = rand(1, 6);
        foreach ($this->playersBets as $row) {

            if ($winningScore === $row['bet']->getScore()) {
                $row['player']->win($row['bet']->getAmount() * 6);
            } else {
                $row['player']->lose();
            }
        }
        unset($this->playersBets);
    }

    function leave($player)
    {
        if (in_array($player, array_keys($this->playersBets))) {
            return;
        }

        unset($this->playersBets[$player]);
    }

}
