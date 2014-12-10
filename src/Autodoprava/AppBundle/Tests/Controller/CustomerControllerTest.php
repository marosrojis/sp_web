<?php

namespace Autodoprava\AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomerControllerTest extends WebTestCase
{
    public function testProfile()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/zakaznik/{id}');
    }

}
