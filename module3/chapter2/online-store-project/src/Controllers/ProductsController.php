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
        echo $this->view->render('index', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    protected  function deleteAction(int $id): void
    {
        // TODO: Implement deleteAction() method.
    }

    protected  function addAction(): void
    {
        // TODO: Implement addAction() method.
    }
}
