<?php
session_start();
require_once "../models/Product.php";
require_once "../models/Size.php";

$product_html = '';
$product_number_in_cart = 0;
$product_info = [];
foreach ($_SESSION['cart'] as $cart_product) {
    $product_number_in_cart++;
    $product = new Product($cart_product['product_id']);
    $size = new Size($cart_product['size_id']);
    $product_size = $size->getValue();
    $product_count = $cart_product['count'];
    $product_title = $product->getTitle();
    $product_info[] = [
        "product_number_in_cart" => $product_number_in_cart,
        "product_title" => $product_title,
        "product_size" => $product_size,
        "product_count" => $product_count
    ];
}

$page_name = "Корзина";
require_once("../views/cart.php");
