<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'project3007';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
$mysqli->set_charset('utf8');

if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к базе данных: " . $mysqli->connect_error;
    die();
}
