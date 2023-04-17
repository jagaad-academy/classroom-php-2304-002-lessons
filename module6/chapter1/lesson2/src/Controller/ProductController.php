<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route(path: '/product')]
class ProductController extends AbstractController
{
    #[Route(
        path: '/',
        name: 'product_home',
        methods: ['GET', 'POST', 'PUT']
    )]
    public function index(): Response
    {
        return new JsonResponse(['message' => 'hello']);
    }

    #[Route(path: '/hello/{name}' /*, requirements: ['name' => '[0-5]{3}']*/)]
    public function hello(string $name): Response
    {
        return new Response('Hello, ' . $name);
    }

    #[Route(path: '/create')]
    public function create(): Response
    {
        return new Response('fake create page');
    }

    #[Route(path: '/edit')]
    public function edit(): Response
    {
        return new Response('fake edit page');
    }

    #[Route(path: '/redirect')]
    public function movePath(): Response
    {
        return $this->redirectToRoute('product_home');
    }
}
