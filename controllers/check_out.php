<?php
session_start();
require_once '../models/Order.php';

if (!empty($_SESSION['cart'])) {
    $address = $_POST['address'];
    $new_order = Order::create($address);

    foreach ($_SESSION['cart'] as $order_item) {
        $product_id = $order_item['product_id'];
        $size_id = $order_item['size_id'];
        $count = $order_item['count'];
        $new_order->addOrderProduct($product_id, $size_id, $count);
    }

    $page_name = "Заказ оформлен!";
    $_SESSION['cart'] = [];
    $message = 'Спасибо за заказ!';
} else {
    $message = 'Корзина пуста';
}
require_once '../views/thanks.php';
