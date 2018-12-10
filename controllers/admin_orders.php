<?php

require_once '../models/Order.php';

$orders = Order::getAll();

require_once '../views/admin_orders.php';
