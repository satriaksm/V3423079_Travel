<?php
require_once 'classes/product.php';
require_once 'classes/user.php';
require_once 'classes/customer.php';
require_once 'classes/admin.php';
require_once 'classes/order.php';

// Create a product
$product = new product("Laptop", 15000000, "Elektronik");

// Create a customer
$customer = new customer("Satria Kusuma Mahardika", "satriaksm.20@student.uns.ac.id", "Karanganyar");

// Create an admin
$admin = new admin("dika", "dika@admin.com", "SuperAdmin");

// Create an order
$order = new order(1, $product, 2);

// Output details
echo $customer->getCustomerInfo() . "<br>";
echo $admin->getAdminInfo() . "<br>";
echo $order->getOrderDetails() . "<br>";

// Admin managing product
echo $admin->manageProduct($product);
