<?php
include "User.php";

class Administrator extends User
{
    public function __construct($username, $email, $password)
    {
        parent::__construct($username, $email, $password);
    }

    public function signIn($username, $password)
    {
        if ($username === $this->getUsername() && $password === $this->getPassword())
            return true;
        else
            return false;
    }

    public function signUp($username, $email, $password)
    {
    }
}
