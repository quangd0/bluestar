<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BotAttribute
{
    public function __construct($speed = null, $strength = null, $agility = null)
    {
        $this->speed = $speed;
        $this->strength = $strength;
        $this->agility = $agility;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getStrength()
    {
        return $this->strength;
    }

    public function getAgility()
    {
        return $this->agility;
    }
}
