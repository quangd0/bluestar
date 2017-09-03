<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class BotManager
{
    public function __construct(ArrayCollection $bots = null, ArrayColltion $substitutes = null)
    {
        $this->bots = ($bots) ? $bots : new ArrayCollection();
        $this->botSubstitutes = ($substitutes) ? $substitutes : new ArrayCollection();
    }

    public function addBot($botPlayer)
    {
        $this->bots->add($botPlayer);
    }

    public function removeBot()
    {
        $this->bots->removeElement($botPlayer);
    }

    public function addSubstitute($botPlayer)
    {
        $this->botSubstitutes->add($botPlayer);
    }

    public function removeSubstitute()
    {
        $this->botSubstitutes->removeElement($botPlayer);
    }

    public function getBotScores() : array
    {
        $botEngine = new BotEngine($this->bots, $this->botSubstitutes);
        $scores = $botEngine->buildScores();
        return [
            'players' => $scores['players'],
            'substitutes' => $scores['substitutes'],
        ];
    }
}
