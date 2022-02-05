<?php

class User
{
    public string $username;
    public string $email;
    public string $password;

    public function __construct($email, $password, $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }
}