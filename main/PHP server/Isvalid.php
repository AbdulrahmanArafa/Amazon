<?php
// setcookie("cooki","test",time()+1,900,800,"/","localhost",TRUE,TRUE);
// session_start()
include('./config.php');
$bool = false;
$first_name = $_POST['first_name'];


if (isset($_POST['first_name'])) {
    $sql1 = "SELECT email,first_name FROM coustomers where first_name='$first_name';";
    $result = $conn->query($sql1);
    $sql2 = "SELECT email,first_name FROM seller where first_name='$first_name' ;";
    $result2 = $conn->query($sql2);
    if ($result->num_rows == 0 and $result2->num_rows == 0) {
        $bool=true;
        echo (1);
    }

}
?>