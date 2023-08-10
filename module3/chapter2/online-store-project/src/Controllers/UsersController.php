<?php

namespace OnlineStoreProject\Controllers;

use OnlineStoreProject\App\Router;
use OnlineStoreProject\Entities\Users;

class UsersController extends A_Controller
{

    protected function indexAction(): void
    {
        $this->checkAccess();
        echo $this->view->render('index', $this->dataToRender);
    }

    protected function editAction(): void
    {
        // TODO: Implement editAction() method.
    }

    protected function deleteAction(): void
    {
        //@TODO: implement deleteAction() method.
    }

    protected function addAction(): void
    {
        $this->checkAccess();

        $userData = $this->validateAndAssignUserData();

        if (!empty($userData)) {
            $users = new Users();
            $result = $users->insert($userData);
            if ($result === true) {
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
        if ($userLoginFailed) {
            $this->dataToRender['error'] = $_SESSION['errorMessage'] ?? "Authentication failed! Please try again!";
        }

        if (!empty($_SESSION['successMessage'])) {
            $this->dataToRender['success'] = $_SESSION['successMessage'];
        }
        echo $this->view->render('login', $this->dataToRender);
    }

    protected function authenticateAction(): void
    {
        $_SESSION['userLoginFailed'] = false;
        $userEmail = $this->getUserEmailOrRedirectToLoginPage();
        $user = new Users();
        $userData = $user->findByEmail($userEmail);
        if (empty($userData)) {
            $_SESSION['errorMessage'] = "There is no user with such email!";
            header('Location: /login');
        } else {
            $this->verifyPasswordAndRedirect($userData);
        }
    }

    protected function logoutAction(): void
    {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: /login');
    }

    private function validateAndAssignUserData(): array
    {
        $userData = [];
        if ($userData[Users::DB_TABLE_FIELD_EMAIL] = filter_var($_POST[Users::DB_TABLE_FIELD_EMAIL], FILTER_VALIDATE_EMAIL)) {
            $userData[Users::DB_TABLE_FIELD_PASSWORD] = htmlentities($_POST[Users::DB_TABLE_FIELD_PASSWORD]);
            $userData[Users::DB_TABLE_FIELD_ADDRESS] = htmlentities($_POST[Users::DB_TABLE_FIELD_ADDRESS]);
            $userData[Users::DB_TABLE_FIELD_PASSWORD] = password_hash($userData[Users::DB_TABLE_FIELD_PASSWORD], PASSWORD_DEFAULT);
        }

        return $userData;
    }

    /**
     * @param  array $userData
     * @return void
     */
    private function verifyPasswordAndRedirect(array $userData): void
    {
        if (!password_verify($_POST['password'], $userData['password'])) {
            $_SESSION['errorMessage'] = "The combination of email and password is not exist!";
            header('Location: /login');
        } else {
            $_SESSION['user'] = $userData;
            header('Location: /');
        }
    }

    private function getUserEmailOrRedirectToLoginPage(): string
    {
        $userEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$userEmail) {
            $_SESSION['errorMessage'] = "Please put a real email!";
            header('Location: /login');
        }
        return $userEmail;
    }
}
