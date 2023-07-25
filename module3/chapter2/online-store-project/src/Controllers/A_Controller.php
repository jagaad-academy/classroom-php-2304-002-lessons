<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\View;
use OnlineStoreProject\Entities\Cart;

abstract class A_Controller implements I_Controller
{
    protected View $view;

    protected array $dataToRender = [];

    /**
     * @param View $view
     */
    public function __construct(View $view)
    {
        $this->view = $view;
        $this->dataToRender["pageTitle"] = "Online shop Jagaad Academy Iteration 2";

        $this->getNumberFromCart();
    }

    abstract protected function indexAction(): void; //GET request

    abstract protected function editAction(): void; //POST request

    abstract protected function deleteAction(): void; //GET request

    abstract protected function addAction(): void; //POST request

    protected function checkAccess(): void
    {
        if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
            header('Location: /login');
        }
    }

    public function __call($name, $args)
    {
        if (method_exists($this, $name)) {
            //Input data validation
            $this->validateInputs();

            $this->view->setActionNameForViews(str_replace('Action', '', $name));
            $classNameSpaceWithName = get_class($this);
            $className = str_replace('OnlineStoreProject\Controllers\\', '', $classNameSpaceWithName);
            $this->view->setClassNameForViews(str_replace('Controller', '', $className));
            return call_user_func_array(array($this, $name), $args);
        }
    }

    private function validateInputs(): void
    {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $value = htmlspecialchars($value);
                $_POST[$key] = $value;
            }
        }
    }

    /**
     * @return void
     */
    protected function getNumberFromCart(): void
    {
        $cart = new Cart();
        $numberInCart = count($cart->findAllByUserId($_SESSION['user']['id'] ?? 0));
        $this->dataToRender['cartQuantity'] = $numberInCart;
    }
}
