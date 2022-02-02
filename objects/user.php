<?php

class User
{
    public string $firstname;
    public string $lastname;
    public string $email;
    public string $password;

    public function __construct($email, $password, $firstname, $lastname)
    {
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFullName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

}