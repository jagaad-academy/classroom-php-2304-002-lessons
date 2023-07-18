<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\Entities\Users;

class UsersController extends A_Controller
{

    protected function indexAction(): void
    {
        if(!empty($_SESSION['user'])){
            header('Location: /');
        }
        echo $this->view->render('index', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    protected function deleteAction(int $id): void
    {
        $this->checkAccess();

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
        $this->checkAccess();

        if($userData[Users::DB_TABLE_FIELD_EMAIL] = filter_var($_POST[Users::DB_TABLE_FIELD_EMAIL], FILTER_VALIDATE_EMAIL)){
            $userData[Users::DB_TABLE_FIELD_PASSWORD] = htmlentities($_POST[Users::DB_TABLE_FIELD_PASSWORD]);
            $userData[Users::DB_TABLE_FIELD_ADDRESS] = htmlentities($_POST[Users::DB_TABLE_FIELD_ADDRESS]);
            $userData[Users::DB_TABLE_FIELD_PASSWORD] = password_hash($userData[Users::DB_TABLE_FIELD_PASSWORD], PASSWORD_DEFAULT);
            $users = new Users();
            $result = $users->insert($userData);
            if($result === true){
                $_SESSION['successMessage'] = "Wow! You have created your account! Please use the login form now!";
                header('Location: /login');
            } else {
                $this->dataToRender['error'] = "Registration failed! Please try one more time!";
                echo $this->view->render('registration', $this->dataToRender);
            }
        } else {
            $_SESSION['errorMessage'] = "Please put a real email!";
            header('Location: /register');
        }
    }

    protected function loginAction(): void
    {
        $this->dataToRender["pageTitle"] = 'Log in';
        $userLoginFailed = $_SESSION['userLoginFailed'] ?? false;
        if($userLoginFailed){
            $this->dataToRender['error'] = $_SESSION['errorMessage'] ?? "Authentication failed! Please try again!";
        }

        if(!empty($_SESSION['successMessage'])){
            $this->dataToRender['success'] = $_SESSION['successMessage'];
        }
        echo $this->view->render('login', $this->dataToRender);
    }
    protected function authenticateAction(): void
    {
        $userExists = false;
        $userData = [];

        $_SESSION['userLoginFailed'] = false;
        if ($userEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $user = new Users();
            $userData = $user->findByEmail($userEmail);
            if (empty($userData)) {
                $_SESSION['errorMessage'] = "There is no user with such email!";
                header('Location: /login');
            } else {
                if (!password_verify($_POST['password'], $userData['password'])) {
                    $_SESSION['errorMessage'] = "The combination of email and password is not exist!";
                    header('Location: /login');
                } else {
                    $userExists = true;
                }
            }
        } else {
            $_SESSION['errorMessage'] = "Please put a real email!";
            header('Location: /login');
        }
        if($userExists){
            $_SESSION['user'] = $userData;
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
