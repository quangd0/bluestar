<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class BotEngine
{
    /**
     * [__construct description]
     * @param ArrayCollection|null $bots           [description]
     * @param ArrayCollection|null $botSubstitutes [description]
     */
    public function __construct(ArrayCollection $bots = null, ArrayCollection $botSubstitutes = null)
    {
        $this->bots = ($bots) ? $bots : new ArrayCollection();
        $this->botSubstitutes = ($botSubstitutes) ? $botSubstitutes : new ArrayCollection();
    }

    /**
     * [buildScores description]
     * @return [type] [description]
     */
    public function buildScores() : array
    {
        $scores = new ArrayCollection();
        // Build the score engine based on the attributes of the bots
        return [
            'players' => $this->bots,
            'substitutes' => $this->botSubstitutes,
        ];
    }
}
