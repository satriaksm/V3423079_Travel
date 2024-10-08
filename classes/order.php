<?php
class order
{
    public $orderNumber;
    public $product;
    public $quantity;

    public function __construct($orderNumber, $product, $quantity)
    {
        $this->orderNumber = $orderNumber;
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function getOrderDetails()
    {
        return "Order #: $this->orderNumber, " . $this->product->getDetails() . ", Quantity: $this->quantity";
    }
}
