<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\Router;
use OnlineStoreProject\Entities\Products;

class ProductsController extends A_Controller
{
    protected function indexAction(): void
    {
        $id = Router::$idURLParameter;
        $product = new Products();
        $productData = $product->findById($id);
        if(empty($productData)){
            header('Location: /notfound');
        }
        $this->dataToRender['product'] = $productData;
//        $this->dataToRender['products'] = $this->getRandomProducts(4);
        $this->dataToRender['products'] = $this->getRandomProductsShuffle(4);
        echo $this->view->render('index', $this->dataToRender);
    }

    protected function allProductsAction(): void
    {
        $product = new Products();
        $productsData = $product->findAll();
        $this->dataToRender['products'] = $productsData;
        echo $this->view->render('allProducts', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    protected  function deleteAction(): void
    {
        // TODO: Implement deleteAction() method.
    }

    protected  function addAction(): void
    {
        // TODO: Implement addAction() method.
    }

    private function getRandomProducts(int $numberOfProducts): array
    {
        $products = [];
        $product = new Products();
        $maxId = $product->findMaximalId();
        for($i = 0; $i < $numberOfProducts; $i++){
            $randomId = rand(1,$maxId);
            $products[] = $product->findById($randomId);
        }

        return $products;
    }

    private function getRandomProductsShuffle(int $numberOfProducts): array
    {
        $product = new Products();
        $products = $product->findAll();
        shuffle($products);
        return array_slice($products, 0, $numberOfProducts);
    }
}
