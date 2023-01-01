<?php
// his file send data of product from database to clint 
include('./config.php');
$name = $_POST['name'];
$des = $_POST['des'];
$price = $_POST['price'];
$category = $_POST['category'];

$img = $_FILES['img'];


$img_name = $_FILES['img']['name'];
$img_size = $_FILES['img']['size'];
$tmp_name = $_FILES['img']['tmp_name'];
$error = $_FILES['img']['error'];


$sql1 = " SELECT * FROM `category`WHERE `category_name`= '$category'";
$result = $conn->query($sql1);
$productcat = mysqli_fetch_array($result, MYSQLI_ASSOC);
if ($result->num_rows === 0)
{
    echo " please select right category"; 

} else {
    $id = $productcat['category_id'];
    if ($error === 0) {
        if ($img_size > 5000000 ) {//5mb
            $em = "Sorry, your file is too large.";
            echo ($em);
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png", "webp");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = './../imges/uploads/' . $new_img_name;
                // echo($new_img_name ."\n".$img_upload_path);
                move_uploaded_file($tmp_name, $img_upload_path);
                // using the open session 
                session_start();
                $seller_id = $_SESSION["first_name"];

                // Insert into Database

                $sql = "INSERT INTO products(img_url,price,name,category_no,seller_no,des ) 
				        VALUES('$new_img_name','$price','$name','$id','$seller_id','$des
                        ')";
                mysqli_query($conn, $sql);
                // header("Location: view.php");
            } else {
                $em = "You can't upload files of this type";
                echo ($em);
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: index.php?error=$em");
    }
}
?>