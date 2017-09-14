<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Objects\{BotManager, BotAttribute, BotPlayer};

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage", defaults={"application_id" = 45316, "contactId" = null})
     */
    public function indexAction(Request $request)
    {
        dump($request);
        $botManager = new BotManager();

        // Bot player
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));
        $botManager->addBot(new BotPlayer(new BotAttribute()));

        // Bot substitute
        $botManager->addSubstitute(new BotPlayer(new BotAttribute()));
        $botManager->addSubstitute(new BotPlayer(new BotAttribute()));
        $botManager->addSubstitute(new BotPlayer(new BotAttribute()));
        $botManager->addSubstitute(new BotPlayer(new BotAttribute()));
        $botManager->addSubstitute(new BotPlayer(new BotAttribute()));

        // Get the scores
        $botScores = $botManager->getBotScores();
        return $this->render('@AppBundle/index.html.twig', [
            'bots'          => $botScores['players'],
            'substitutes'    => $botScores['substitutes'],
        ]);
    }
}
