<?php

function login(string $email, string $password): bool
{
    logout();

    $user = getUserByEmail($email);

    // if user not exist (is NULL)
    //if (! $user) return false;

    // short syntax to remove the above one
    $isValid = $user && password_verify($password, $user['password']);
    if ($isValid) {
        $_SESSION['logged_in'] = true;
        $_SESSION['logged_user'] = $user['full_name'];
        $_SESSION['logged_user_id'] = $user['user_id'];
    }

    return $isValid;
}

function isAuthenticated(): bool
{
    // check if the $_SESSION['logged_in'] exists
    // and if it's true.
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'];
}

function authenticatedUser(): ?array
{
    if (isset($_SESSION['logged_user'])) {
        return [
            'id' => $_SESSION['logged_user_id'],
            'name' => $_SESSION['logged_user'],
        ];
    }
    return null;
}

function logout(): void
{
    unset(
        $_SESSION['logged_in'], 
        $_SESSION['logged_user'],
        $_SESSION['logged_user_id']
    );
}

function protectPage(): void
{
    if (! isAuthenticated()) {
        logout();
        header('Location: /login.php');
        die;
    }
}
