<?php

namespace Autodoprava\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PrepravaControllerTest extends WebTestCase
{
    public function testPickup()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Pickup');
    }

    public function testDodavkova()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Dodavkova');
    }

    public function testNakladni()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Nakladni');
    }

    public function testStehovani()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Stehovani');
    }

    public function testSkladovani()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/Skladovani');
    }

}
