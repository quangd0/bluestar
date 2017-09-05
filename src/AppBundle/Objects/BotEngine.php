<?php

namespace AppBundle\Objects;

use Doctrine\Common\Collections\ArrayCollection;

class BotEngine
{
    const MAX_TEAM_SCORE = 175;
    const MAX_PLAYER_SCORE = 100;
    const SEEDED = 13;
    const MAX_PLAYER = 10;
    const MAX_ATTRIBUTE = 3;

    /**
     * Create an instance
     * @param ArrayCollection|null $bots           [description]
     * @param ArrayCollection|null $botSubstitutes [description]
     */
    public function __construct(ArrayCollection $bots = null, ArrayCollection $botSubstitutes = null)
    {
        $this->bots = ($bots) ? $bots : new ArrayCollection();
        $this->botSubstitutes = ($botSubstitutes) ? $botSubstitutes : new ArrayCollection();
    }

    /**
     * Generates player scores
     * @return [type] [description]
     */
    public function buildScores() : array
    {
        $score = $this->generateScores();
        $attributes = $this->generateAttributes($score);

        $this->bots = $this->bots->map(function (BotPlayer $player) use ($score, $attributes) {
            static $index = 0;
            return $player
                ->setName(sprintf("ABC%04d", $index))
                ->setScore($score[0][$index])
                ->setAttribute($attributes[$index++]);
        });

        // Build the score engine based on the attributes of the bots
        return [
            'players' => $this->bots,
            'substitutes' => $this->botSubstitutes,
        ];
    }

    private function generateAttributes(ArrayCollection $scores) : ArrayCollection
    {
        $scores = new ArrayCollection($scores[0]);
        $attributes = $scores->map(function (int $score) use ($scores) {
            static $index = 0;
            
            $attributesFound = new ArrayCollection();
            $this->recursion($scores[$index++], 1, [], self::MAX_ATTRIBUTE, $attributesFound);
            
            // Use random to pick the list
            $count = count($attributesFound);
            $picked = random_int(0, $count - 1);
            $speed      = $attributesFound[$picked][0];
            $strength   = $attributesFound[$picked][1];
            $agility    = $attributesFound[$picked][2];

            $attribute = new BotAttribute($speed, $strength, $agility);
            return $attribute;
        });

        return $attributes;
    }

    private function generateScores()
    {
        $numbersFound = new ArrayCollection();
        $this->recursion(self::MAX_TEAM_SCORE, self::SEEDED, [], self::MAX_PLAYER, $numbersFound);
        return $numbersFound;
    }

    private function recursion(int $left, int $last, array $ar, $maxCount, &$numbersFound)
    {
        if($left == 0) {

            $unique = array_unique($ar);

            if (count($ar) == count($unique) && count($unique) == $maxCount) 
            {
                $numbersFound->add($unique);
            }
            
            return;
        }
        
        for($n = $last; $n <= $left; $n++) 
        {
            $b = $ar;
            array_push($b, $n);
            $this->recursion($left - $n, $n, $b, $maxCount, $numbersFound);
        }
    }
}
