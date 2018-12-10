<?php

require_once '../models/Category.php';
require_once '../models/Collection.php';

$categories = Category::getAll();
$collections = Collection::getAll();

require_once '../views/add_product.php';

?>

