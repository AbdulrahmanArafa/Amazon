<?php

include('./config.php');
$id = $_COOKIE["coustomer"];

$sql = "SELECT  `product_name`, `total_price` FROM `shopping_cart` WHERE `coustomer_no`=$id  ";

// Process the query
$results = $conn->query($sql);

// Fetch Associative array

while ($data = $results->fetch_assoc()) {
    $row[] = $data;
}

// Free result set
$results->free_result();

// Close the connection after using it

// Encode array into json format
echo json_encode($row);

?>