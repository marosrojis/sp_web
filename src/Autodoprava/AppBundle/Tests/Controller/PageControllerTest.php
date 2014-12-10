<?php

namespace Autodoprava\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PageControllerTest extends WebTestCase
{
    public function testOnas()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/stranky/oNas');
    }

    public function testNabidka()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/stranky/nabidka');
    }

}
