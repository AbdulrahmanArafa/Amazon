
<?php
// his file send data of product from database to clint
include('./config.php');
$count=$_POST['count'];
// Set the INSERT SQL data
$sql = "SELECT * FROM `products` WHERE `product_id` > $count  LIMIT 3";

// Process the query
$results = $conn->query($sql);

// Fetch Associative array

while ($data=$results->fetch_assoc()) {
    $row[] = $data;
}

// Free result set
$results->free_result();

// Close the connection after using it

// Encode array into json format
echo json_encode($row);


?>