<?php

namespace AppBundle\Objects;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BotPlayer
{
    public function __construct($botAttribute = null)
    {
        $this->botAttribute = ($botAttribute) ? $botAttribute : new BotAtttribute();
    }

    public function getSpeed()
    {
        return $this->botAttribute->getSpeed();
    }

    public function getStrength()
    {
        return $this->botAttribute->getStrength();
    }

    public function getAgility()
    {
        return $this->botAttribute->getAgility();
    }
}
