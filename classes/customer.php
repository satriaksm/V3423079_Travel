<?php
require_once 'User.php';

class customer extends user
{
    public $address;

    public function __construct($username, $email, $address)
    {
        parent::__construct($username, $email);
        $this->address = $address;
    }

    public function getCustomerInfo()
    {
        return parent::getUserInfo() . ", Address: $this->address";
    }
}
