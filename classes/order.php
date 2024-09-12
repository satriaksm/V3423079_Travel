<?php
class order
{
    public $orderNumber;
    public $product;
    public $quantity;

    public function __construct($orderNumber, product $product, $quantity)
    {
        $this->orderNumber = $orderNumber;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getOrderDetails()
    {
        return "Order #: $this->orderNumber, Product: " . $this->product->getDetails() . ", Quantity: $this->quantity";
    }
}
