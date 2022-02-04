<?php

class Auth extends User
{
    public bool $isAdmin;
    public int $userid;

    public function adminCheck($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        if($isAdmin === true){
            $_SESSION['isAdmin'] = true;
        }else{
            $_SESSION['isAdmin'] = false;
        }
    }
}