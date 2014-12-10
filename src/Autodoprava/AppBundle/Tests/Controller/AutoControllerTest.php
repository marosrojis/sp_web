<?php

namespace Autodoprava\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AutoControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/auto/');
    }

    public function testEditstatus()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/auto/editStatus');
    }

}
