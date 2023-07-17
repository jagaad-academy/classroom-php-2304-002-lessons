<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\Entities\Users;

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
        $users = new Users();
        $result = $users->deleteById($id);
        if($result === true){
            //header('Location: /login');
        } else{
            $this->dataToRender['error'] = "Deletion failed! Please try one more time!";
            //echo $this->view->render('registration', $this->dataToRender);
        }
    }

    protected function addAction(): void
    {
        $userData[Users::DB_TABLE_FIELD_EMAIL] = $_POST[Users::DB_TABLE_FIELD_EMAIL];
        $userData[Users::DB_TABLE_FIELD_PASSWORD] = $_POST[Users::DB_TABLE_FIELD_PASSWORD];
        $userData[Users::DB_TABLE_FIELD_ADDRESS] = $_POST[Users::DB_TABLE_FIELD_ADDRESS];

        $users = new Users();
        $result = $users->insert($userData);
        if($result === true){
            header('Location: /login');
        } else {
            $this->dataToRender['error'] = "Registration failed! Please try one more time!";
            echo $this->view->render('registration', $this->dataToRender);
        }
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
