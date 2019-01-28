<?php
/**
 * Created by PhpStorm.
 * User: hdessomme
 * Date: 28/01/19
 * Time: 13:07
 */

$connect = mysqli_connect('localhost', 'superroot', 'superroot', 'udemy-erwin-diaz');

$search = $_POST['search'];

if (!empty($search)) {
    $query = "SELECT * FROM cars WHERE car LIKE '$search%'";
    $searchQuery = mysqli_query($connect, $query);

    if (!$searchQuery) {
        die('QUERY FAILED' . mysqli_error($connect));
    }

    while ($row = mysqli_fetch_array($searchQuery)) {
        $brand = $row['car'];
 ?>
        <ul class="list-unstyled">
            <?php echo "<li>{$brand} in stock</li>"; ?>
        </ul>
<?php
    }
}