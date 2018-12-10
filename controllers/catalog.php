<?php

require_once '../models/Product.php';
require_once '../models/Category.php';
require_once '../models/Collection.php';

$category_id = isset($_GET['category_id']) ? $_GET['category_id'] : false;
$collection_id = isset($_GET['collection_id']) ? $_GET['collection_id'] : false;

if (isset($_GET['category_id'])) {
    $category = new Category($category_id);
    $category_title = $category->getTitle();
} else {
    $category_title = 'Все товары';
}

if (isset($_GET['collection_id'])) {
    $collection = new Collection($collection_id);
    $collection_title = $collection->getTitle();
} else {
    $collection_title = 'Каталог';
}

$products = Product::getAll($category_id, $collection_id);
$categories = Category::getAll();

$page_name = 'Каталог';
require_once '../views/catalog.php';
