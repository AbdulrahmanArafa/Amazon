<?php
include('./config.php');

$idProduct=$_GET['idProduct'];
$qu = 1;


$sql="SELECT * FROM `products` WHERE `product_id`=$idProduct";
$results = mysqli_query($conn, $sql);
$prod = mysqli_fetch_array($results, MYSQLI_ASSOC);

$name = $prod['name'];
$price = $prod['price']*$qu;

$id = $_COOKIE["coustomer"];
if ($id){
    $sql1 = "INSERT INTO shopping_cart(product_id ,product_name ,total_price,coustomer_no) 
    VALUES('$idProduct','$name','$price','$id')";
    $results = mysqli_query($conn, $sql1);

    
}else{
    echo "$id ";
}


?>