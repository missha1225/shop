<?php


require_once "../models/user.php";

$email = $_POST['email'];
$pass = $_POST['pass'];

User::getByEmailPass($email, $pass);

require_once '../views/admin_auth.php';
