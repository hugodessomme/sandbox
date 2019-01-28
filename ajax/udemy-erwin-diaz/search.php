<?php
require_once 'db.php';

$search = $_POST['search'];

if (!empty($search)) {
    $stmt = $dbh->prepare('SELECT car FROM cars WHERE car LIKE :search');
    $stmt->bindValue(':search', $search . '%', PDO::PARAM_STR);
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_OBJ);

    echo '<ul>';
    foreach ($cars as $car) {
        echo '<li>' . $car->car . ' in stock</li>';
    }
    echo '</ul>';
}