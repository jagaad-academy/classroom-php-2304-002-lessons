<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\Router;
use OnlineStoreProject\Entities\Cart;
use OnlineStoreProject\Entities\Products;

class CartController extends A_Controller
{

    protected function indexAction(): void
    {
        $this->checkAccess();

        $cart = new Cart();
        $cartItems = $cart->findAllByUserIdJoinWithProducts($_SESSION['user']['id']);
        $this->dataToRender['items'] = $cartItems;
        echo $this->view->render('list', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    protected function deleteAction(int $id): void
    {
        // TODO: Implement deleteAction() method.
    }

    protected function addAction(): void
    {
        $this->checkAccess();
        $cardData[Cart::DB_TABLE_FIELD_PRODUCT] = (int)(htmlentities($_POST['productId']));
        $product = new Products();
        $productData = $product->findById($cardData[Cart::DB_TABLE_FIELD_PRODUCT]);
        if(empty($productData)){
            header('Location: /notfound');
        }

        $cardData[Cart::DB_TABLE_FIELD_QNT] = htmlentities($_POST['quantity']);
        $cardData[Cart::DB_TABLE_FIELD_USERID] = $_SESSION['user']['id'];
        $cart = new Cart();
        $result = $cart->insert($cardData);
        if($result === true){
            $this->dataToRender['success'] = "Product has been added to your cart.";
            $this->getNumberFromCart();
        } else {
            $this->dataToRender['error'] = "Product has NOT been added to your cart. Please try again.";
        }

        $this->dataToRender['product'] = $productData;
        echo $this->view->render('index', $this->dataToRender);
    }
}
