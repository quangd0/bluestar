<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BotAttribute
{
    /**
     * Create the object
     * @param integer $speed    [description]
     * @param integer $strength [description]
     * @param integer $agility  [description]
     */
    public function __construct($speed = null, $strength = null, $agility = null)
    {
        $this->speed = $speed;
        $this->strength = $strength;
        $this->agility = $agility;
    }

    /**
     * [getSpeed description]
     * @return [type] [description]
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * Set the speed
     * @return BotAttribute player attributes
     */
    public function setSpeed($value) : BotAttribute
    {
        $this->speed = $value;
        return $this;
    }

    /**
     * [getStrength description]
     * @return [type] [description]
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set Strength
     * @return BotAttribute player attributes
     */
    public function setStrength($value) : BotAttribute
    {
        $this->strength = $value;
        return $this;
    }

    /**
     * [getAgility description]
     * @return [type] [description]
     */
    public function getAgility()
    {
        return $this->agility;
    }

    /**
     * Set Agility
     * @return BotAttribute player attributes
     */
    public function setAgility($value) : BotAttribute
    {
        $this->agility = $value;
        return $this;
    }
}
