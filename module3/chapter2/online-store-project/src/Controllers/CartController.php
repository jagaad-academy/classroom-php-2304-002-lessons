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

    protected function deleteAction(): void
    {
        $this->checkAccess();
        $id = Router::$idURLParameter;
        $cart = new Cart();
        $result = $cart->deleteByProductId($id);
        if($result === true){
            $this->dataToRender['success'] = "Product has been deleted from cart.";
        } else{
            $this->dataToRender['error'] = "Deletion failed! Please try one more time!";
        }
        header('Location: /cart');

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

    protected function checkoutAction(): void
    {
        $result = true;
        $this->checkAccess();
        $cart = new Cart();
        $cartItems = $cart->findAllByUserId($_SESSION['user']['id']);
        if(!empty($cartItems)){
            foreach ($cartItems as $item){
                $cartId = $item['id'];
                $result &= $cart->updateCartItemAsChekedout($cartId);
            }
        }

        if($result){
            header("Location: /thankyou");
        } else {
            $this->dataToRender['error'] = "Something went wrong upon checkout. Please try again.";
            header("Location: /cart");
        }
    }

    protected function thankyouAction(): void
    {
        $this->checkAccess();
        echo $this->view->render('thankyouPage', $this->dataToRender);
    }
}
