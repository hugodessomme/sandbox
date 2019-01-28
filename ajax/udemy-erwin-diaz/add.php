<?php
require 'db.php';

if (isset($_POST['car_name'])) {
    $stmt = $dbh->prepare('INSERT INTO cars(car) VALUES(:car)');
    $stmt->bindValue(':car', $_POST['car_name']);
    
    if ($stmt->execute()) {
        echo 'Added!';
    } else {
        die('Something went wrong');
    }
}