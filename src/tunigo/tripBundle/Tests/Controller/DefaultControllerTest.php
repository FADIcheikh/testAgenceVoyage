<?php

namespace tunigo\tripBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/hello/Fadi');

        $this->assertTrue($crawler->filter('html:contains("Hello Fadi")')->count() > 0);
    }
}
