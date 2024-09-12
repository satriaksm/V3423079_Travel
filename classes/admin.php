<?php
require_once 'User.php';

class admin extends user
{
    public $role;

    public function __construct($username, $email, $role)
    {
        parent::__construct($username, $email);
        $this->role = $role;
    }

    public function getAdminInfo()
    {
        return parent::getUserInfo() . ", Role: $this->role";
    }

    public function manageProduct(product $product)
    {
        return "Managing product: " . $product->getDetails();
    }
}
