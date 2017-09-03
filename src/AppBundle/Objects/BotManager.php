<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Collections\ArrayCollection;

class BotManager
{
    /**
     * [__construct description]
     * @param ArrayCollection|null $bots        [description]
     * @param ArrayColltion|null   $substitutes [description]
     */
    public function __construct(ArrayCollection $bots = null, ArrayColltion $substitutes = null)
    {
        $this->bots = ($bots) ? $bots : new ArrayCollection();
        $this->botSubstitutes = ($substitutes) ? $substitutes : new ArrayCollection();
    }

    /**
     * [addBot description]
     * @param [type] $botPlayer [description]
     */
    public function addBot($botPlayer)
    {
        $this->bots->add($botPlayer);
    }

    /**
     * [removeBot description]
     * @return [type] [description]
     */
    public function removeBot()
    {
        $this->bots->removeElement($botPlayer);
    }

    /**
     * [addSubstitute description]
     * @param [type] $botPlayer [description]
     */
    public function addSubstitute($botPlayer)
    {
        $this->botSubstitutes->add($botPlayer);
    }

    /**
     * [removeSubstitute description]
     * @return [type] [description]
     */
    public function removeSubstitute()
    {
        $this->botSubstitutes->removeElement($botPlayer);
    }

    /**
     * [getBotScores description]
     * @return [type] [description]
     */
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
