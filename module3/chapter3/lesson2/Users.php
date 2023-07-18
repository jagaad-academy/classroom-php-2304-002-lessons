<?php

class Users
{
    public int $id;
    public string $email;
    public string $password;
    public string $address;

    public function __construct()
    {
        $this->email = 'test@gmail.com';
        print_r($this);
    }
}
