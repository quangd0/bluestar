<?php
namespace AppBundle\Tests\Objects;

use PHPUnit\Framework\TestCase;
use AppBundle\Objects\{BotManager, BotAttribute, BotPlayer, BotEngine};
use Doctrine\Common\Collections\ArrayCollection;

use \Mockery as m;

class BotEngineTest extends TestCase
{
    public function tearDown()
    {
        m::close();
    }

    public function setUp()
    {
        $bots = new ArrayCollection();
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $bots->add(new BotPlayer(new BotAttribute()));
        $this->engine = new BotEngine($bots);
    }

    public function testEngineHasKeys()
    {
        $actual =  $this->engine->buildScores();
        $this->assertArrayHasKey('players', $actual);
        $this->assertArrayHasKey('substitutes', $actual);
    }

    public function testEngineReturnedObject()
    {
        $actual =  $this->engine->buildScores();
        $this->assertInstanceOf(ArrayCollection::class, $actual['players']);
    }

    public function testEngineReturnedResults()
    {
        $actual =  $this->engine->buildScores();
        $this->assertInstanceOf(BotPlayer::class, $actual['players'][0]);
    }

    public function testEngineReturnedResultsScore()
    {
        $expected = [13, 14, 15, 16, 17, 18, 19, 20, 21, 22];
        $actual =  $this->engine->buildScores();
        $this->assertEquals(13, $actual['players'][0]->getScore());
        $this->assertEquals(14, $actual['players'][1]->getScore());
        $this->assertEquals(15, $actual['players'][2]->getScore());
        $this->assertEquals(16, $actual['players'][3]->getScore());
        $this->assertEquals(17, $actual['players'][4]->getScore());
        $this->assertEquals(18, $actual['players'][5]->getScore());
        $this->assertEquals(19, $actual['players'][6]->getScore());
        $this->assertEquals(20, $actual['players'][7]->getScore());
        $this->assertEquals(21, $actual['players'][8]->getScore());
        $this->assertEquals(22, $actual['players'][9]->getScore());
    }
}