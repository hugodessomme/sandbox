<?php
/**
 * Created by PhpStorm.
 * User: hdessomme
 * Date: 28/01/19
 * Time: 13:07
 */

$search = $_POST['search'];

if (!empty($search)) {
    $dsn = 'mysql:host=localhost;dbname=udemy-erwin-diaz';
    $username = 'superroot';
    $password = 'superroot';
    $options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );

    try {
        $dbh = new PDO($dsn, $username, $password, $options);
    } catch (Exception $e) {
        echo $e->getMessage();
    }

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