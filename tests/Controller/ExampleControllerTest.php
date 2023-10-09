<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator;
use Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage;

class ExampleControllerTest extends WebTestCase
{
    public function testExample(): void
    {
        $client = static::createClient();
        /** @var UriSafeTokenGenerator */
        $tokenGenerator = $this->getContainer()->get('security.csrf.token_generator');
        /** @var SessionTokenStorage */
        $tokenStorage = $this->getContainer()->get('security.csrf.token_storage');
        $token = $tokenGenerator->generateToken();
        $tokenStorage->setToken('example', $token);
        $client->request('POST', '/example', ['_token' => $token]);
        $this->assertResponseIsSuccessful();
    }
}
