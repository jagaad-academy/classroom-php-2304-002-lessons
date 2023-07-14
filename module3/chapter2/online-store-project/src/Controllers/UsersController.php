<?php

namespace OnlineStoreProject\Controllers;

class UsersController extends A_Controller
{

    protected function indexAction(): void
    {
        // TODO: Implement indexAction() method.
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
        // TODO: Implement addAction() method.
    }

    protected function loginAction(): void
    {
        $this->dataToRender["pageTitle"] = 'Log in';
        if($_SESSION['userLoginFailed']){
            $this->dataToRender['error'] = "Authentication failed! Please try again!";
        }
        echo $this->view->render('login', $this->dataToRender);
    }
    protected function authenticateAction(): void
    {
        $userExists = false;
        $_SESSION['userLoginFailed'] = false;

        //@TODO: add authentication logic
        if($userExists){
            $_SESSION['user'] = []; //@TODO: put user object (UsersEntity)
            header('Location: /');
        } else {
            $_SESSION['userLoginFailed'] = true;
            header('Location: /login');
        }

    }
    protected function logoutAction(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /login');
    }
}
