<?php
// src/AppBundle/Controller/TextsController.php

// ...
namespace AppBundle\Controller;

use AppBundle\Entity\Texts;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/texts")
 */
class TextsController extends Controller
{
    /**
     * @Route("/save/{Id}/{texts}", name="textlist", defaults={"Id"="null"})
     */
    public function saveAction($Id = null, $texts)
    {
        $texts = new Texts();
        $texts->setText($texts);
        $em = $this->getDoctrine()->getManager();

        if ($id == null)
        {
            $text = $em->getRepository('AppBundle:Texts')->find($Id);

        }
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($texts);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new texts with id '.$texts->getId());
    }

    /**
     * @Route("/show/{id}", defaults={"id"=1})
     */
    public function showAction($id = 1)
    {
        $em = $this->getDoctrine()->getManager();

        // Get the texts from persistence
        $texts = $em->getRepository('AppBundle:Texts')->find($Id);

        if (!$texts) {
            throw $this->createNotFoundException(
                'No text found for id '.$Id
            );
        }

        return new Response(json_encode(['status' => true, 'data' => $texts->getText()]));
    }

}
