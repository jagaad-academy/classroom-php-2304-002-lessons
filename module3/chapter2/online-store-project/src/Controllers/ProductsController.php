<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\Entities\Products;

class ProductsController extends A_Controller
{
    protected function indexAction(): void
    {
//        $id = $this->getRequestParameter('id');
        $id=1;
        $product = new Products();
        $this->dataToRender['product'] = $product->findById($id);
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
