<?php

class Auth
{
    public string $userFirstName;
    public string $userLastName;
    public string $userPassword;

    public function __construct($userFirstName, $userLastName,$userPassword)
    {
        $this->userFirstName = $userFirstName;
        $this->userLastName = $userLastName;
        $this->userPassword = $userPassword;
    }
}