<?php

// Database Connection
$dsn = 'mysql:host=localhost;dbname=udemy-erwin-diaz';
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

try {
    $dbh = new PDO($dsn, $username, $password, $options);
} catch (Exception $e) {
    echo $e->getMessage();
}