<?php
class user
{
    public $username;
    public $email;

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUserInfo()
    {
        return "Username: $this->username, Email: $this->email";
    }
}
