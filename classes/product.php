<?php
class Product
{
    public $name;
    public $price;
    public $category;

    public function __construct($name, $price, $category)
    {
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getDetails()
    {
        return "Product: $this->name, Price: $this->price, Category: $this->category";
    }
}
