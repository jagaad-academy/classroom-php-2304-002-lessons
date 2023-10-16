<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products', name: 'app_products', methods: ['GET', 'HEAD'])]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'title' => 'Products list'
        ]);
    }

    #[Route('/product/{id}', name: 'app_product', methods: ['GET', 'HEAD'])]
    public function product(): Response
    {
        return $this->render('product/product.html.twig', [
            'name' => 'Test product',
            'title' => 'Page of the product #1'
        ]);
    }
}
