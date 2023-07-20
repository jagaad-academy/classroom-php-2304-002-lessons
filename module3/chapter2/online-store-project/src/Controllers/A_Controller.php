<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\View;

abstract class A_Controller implements I_Controller
{
    protected View $view;

    protected array $dataToRender = [];

    public function __construct(View $view)
    {
        $this->view = $view;
        $this->dataToRender["pageTitle"] = "Online shop Jagaad Academy Iteration 2";
    }

    abstract protected function indexAction(): void; //GET request

    abstract protected function editAction(): void; //POST request

    abstract protected function deleteAction(int $id): void; //GET request

    abstract protected function addAction(): void; //POST request

    protected function checkAccess(): void
    {
        if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
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
        if(!empty($_POST)){
            foreach ($_POST as $key => $value) {
                $value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $value = htmlspecialchars($value);
                $_POST[$key] = $value;
            }
        }
    }

    protected function getRequestParameter(string $parameter): string
    {
        //@TODO: use the rout value from Router class
        $parameterToReturn = '';
        $requestUrl = $_SERVER['REQUEST_URI'];
        $regExp = "^\/(.*)\/({" . $parameter . "})$";
        if(preg_match($regExp, $requestUrl, $match)){
            $parameterToReturn = $match[2] ?? '';
        }

        return $parameterToReturn;
    }
}
