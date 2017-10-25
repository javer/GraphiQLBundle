<?php

namespace Overblog\GraphQLBundle\Tests\Controller;

use Overblog\GraphiQLBundle\Tests\TestCase;
use Symfony\Component\HttpFoundation\Response;

class GraphiQLControllerTest extends TestCase
{
    public function testInvalidSchema()
    {
        $client = static::createClient();

        $client->request('GET', '/graphiql/invalid');
        $response = $client->getResponse();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(500, $response->getStatusCode());
    }

    public function testDefaultSchema()
    {
        $client = static::createClient();

        $client->request('GET', '/graphiql');
        $response = $client->getResponse();

        $this->assertInstanceOf(Response::class, $response);
        $this->assertSame(200, $response->getStatusCode());
        $this->stringContains('Loading...', $response->getContent());
    }
}
