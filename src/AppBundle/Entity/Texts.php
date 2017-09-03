<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Texts
 *
 * @ORM\Table(name="texts")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TextsRepository")
 */
class Texts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="texts", type="string", length=255)
     */
    private $texts;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set texts
     *
     * @param string $texts
     *
     * @return Texts
     */
    public function setTexts($texts)
    {
        $this->texts = $texts;

        return $this;
    }

    /**
     * Get texts
     *
     * @return string
     */
    public function getTexts()
    {
        return $this->texts;
    }
}

