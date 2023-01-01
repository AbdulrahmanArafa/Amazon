<?php
// setcookie("cooki","test",time()+1,900,800,"/","localhost",TRUE,TRUE);
// session_start()
include('./config.php');
$bool = false;
$email = $_POST['email'];


if (isset($_POST['email'])) {
    $sql1 = "SELECT email FROM coustomers where email='$email';";
    $result = $conn->query($sql1);
    $sql2 = "SELECT email FROM seller where email='$email' ;";
    $result2 = $conn->query($sql2);
    if ($result->num_rows == 0 and $result2->num_rows == 0) {
        $bool=true;
        echo (1);
    }

}
?>