<?php

$db_host = 'localhost';
$db_user = 'root';
$db_pwd = null;
$db_name = 'banco';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pwd, $options);
} catch(Throwable $err){
    die("error: " . $err->getMessage());
}