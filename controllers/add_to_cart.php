<?php
session_start();

$product_id = $_REQUEST['product_id'];
$size_id = $_REQUEST['size_id'];
$count = $_REQUEST['count'];

$_SESSION['cart'][] = [
    "product_id" => $product_id, 
    "size_id" => $size_id, 
    "count" => $count
];

echo "Товар добавлен в корзину";
