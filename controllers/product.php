<?php

require_once '../models/Product.php';
require_once '../models/Category.php';
require_once '../models/Collection.php';

$product = new Product($_GET['id']);
$page_name = $product->getTitle();
$product_category = new Category($product->getCategoryId());
$product_collection = new Collection($product->getCollectionId());
$category = $product_category->getTitle();
$collection = $product_collection->getTitle();
$sizes = $product->getSizeIdAndValues();
require_once '../views/product.php';
