<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController extends AbstractController
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    #[Route('/another-route', name: 'app_hello_world')]
    public function index(): Response
    {
        $product = new Product();
        $product->setName('test');
        $product->setDescription('description test');
        $product->setPrice(10.5);
        $product->setCreatedAt(new DateTimeImmutable('now'));

        $this->productRepository->save($product, true);

        return $this->render('my-template.html.twig', [
            'controller_name' => 'HelloWorldController',
            'product_id' => $product->getId(),
        ]);
    }
}
