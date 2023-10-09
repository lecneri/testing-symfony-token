<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExampleController extends AbstractController
{
    #[Route('/example', name: 'example')]
    public function example(Request $request): Response
    {
        $token = $request->request->get('_token');
        if (!$this->isCsrfTokenValid('example', $token)) {
            throw new BadRequestException('Invalid CSRF token', Response::HTTP_BAD_REQUEST);
        }
        return new Response('OK');
    }
}
