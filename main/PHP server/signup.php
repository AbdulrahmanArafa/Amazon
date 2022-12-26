<?php
include('./connection.php');


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$pwd1 = $_POST['pwd1'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$logas = $_POST['logas'];


// auto known from phonenumber
$country = 'Egypt';
// make sql query 
$sql;
if ($logas == "customer") {
    $sql = "INSERT INTO coustomers (first_name, last_name,password,email,phone,country)
        VALUES ($first_name,   $last_name,$pwd1$email , $phone,  $country";
} else {
    $sql = "INSERT INTO seller (first_name, last_name,password,email,phone,country)
        VALUES ($first_name,   $last_name,$pwd1,$email , $phone,  $country";
}







?>