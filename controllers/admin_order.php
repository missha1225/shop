<?php

require_once '../models/Order.php';
require_once '../models/Product.php';

$order = new Order($_GET['id']);
$page_name = "Заказ #". $order->getId();

$products = Product::getAll();
var_dump ($products);

require_once '../views/admin_order.php';