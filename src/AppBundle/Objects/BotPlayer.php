<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BotPlayer
{
    /**
     * A player attribute
     * @var BotAtttribute
     */
    private $botAttribute;

    /**
     * A player score
     * @var integer
     */
    private $score;

    /**
     * A player name
     * @var [type]
     */
    private $name;

    /**
     * Get the name of the player
     * @return [type] [description]
     */
    public function getName() : string
    {
        return ($this->name) ?: '';
    }

    public function setName($value) : BotPlayer
    {
        $this->name = $value;
        return $this;
    }

    /**
     * [__construct description]
     * @param [type] $botAttribute [description]
     */
    public function __construct($botAttribute = null)
    {
        $this->botAttribute = ($botAttribute) ? $botAttribute : new BotAtttribute();
    }

    /**
     * Get the play attribute
     * @return BotAttribute the player attribute
     */
    public function getAttribute() : BotAttribute
    {
        return $this->botAttribute;
    }

    public function setAttribute(BotAttribute $botAttribute)
    {
        $this
            ->setSpeed($botAttribute->getSpeed())
            ->setAgility($botAttribute->getAgility())
            ->setStrength($botAttribute->getStrength());
        return $this;
    }

    /**
     * [getSpeed description]
     * @return [type] [description]
     */
    public function getSpeed()
    {
        return $this->botAttribute->getSpeed();
    }

    /**
     * Set a player speed
     * @return void
     */
    public function setSpeed($value)
    {
        return $this->botAttribute->setSpeed($value);
    }

    /**
     * [getStrength description]
     * @return [type] [description]
     */
    public function getStrength()
    {
        return $this->botAttribute->getStrength();
    }

    /**
     * Set strength
     * @return void set the strength
     */
    public function setStrength($value)
    {
        return $this->botAttribute->setStrength($value);
    }

    /**
     * Get agility
     * @return integer the player agility
     */
    public function getAgility()
    {
        return $this->botAttribute->getAgility();
    }

    /**
     * Set agility
     * @return void
     */
    public function setAgility($value)
    {
        return $this->botAttribute->setAgility($value);
    }

    /**
     * [setScore description]
     * @param [type] $value [description]
     */
    public function setScore($value)
    {
        $this->score = $value;
        return $this;
    }

    /**
     * A player score
     * @return integer a player score
     */
    public function getScore()
    {
        return $this->score;
    }
}
