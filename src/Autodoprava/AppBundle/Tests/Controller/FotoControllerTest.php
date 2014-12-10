<?php

namespace Autodoprava\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class FotoControllerTest extends WebTestCase
{
    public function testFotocar()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/auto/foto/{idCar}');
    }

    public function testEditfoto()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/auto/foto/edit/{id}');
    }

}
