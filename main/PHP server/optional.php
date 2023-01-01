<?php

include('./config.php');

$cat = $_POST['category'];

$i = 0;
if (isset($_POST['category'])) {


    $cat = strtolower($cat);
    $sql1 = "SELECT category_name FROM `category` WHERE `category_name` LIKE '%$cat%'; ";
    $result = mysqli_query($conn, $sql1);
    if ($result !== 0 || $cat=="") {
        while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            print($data['category_name']);
            echo ("\n");
           
        }

    } else {
        echo ("Error: not found in database called admin or add new catalog");

    }



} else {

    echo ("Error: not found in database return to admin");
}
?>