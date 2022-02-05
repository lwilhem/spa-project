<?php

class Auth
{
    public string $userName;
    public string $userPassword;

    public function __construct($userName, $userPassword)
    {
        $this->userName = $userName;
        $this->userPassword = $userPassword;
    }
}