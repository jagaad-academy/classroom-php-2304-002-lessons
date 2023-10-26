<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }

    #[Route('/product/{id}', name: 'app_product_by_id')]
    public function showProduct(Product $product): Response
    {
        return $this->render('product/product.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product/{product_id}', name: 'app_product_by_id_and_option')]
    public function showProductByOption(Product $product): Response
    {
        return $this->render('product/product.html.twig', [
            'product' => $product,
        ]);
    }

    #[Route('/product-by-name/{name}', name: 'app_product_by_name')]
    public function showProductByName(Product $product): Response
    {
        return $this->render('product/product.html.twig', [
            'product' => $product,
        ]);
    }
}
