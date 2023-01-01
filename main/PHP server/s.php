<?php
// setcookie("cooki","test",time()+1,900,800,"/","localhost",TRUE,TRUE);
// session_start()
include('./config.php');


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$pwd1 = $_POST['pwd1'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$logas = $_POST['logas'];
$country = 'Egypt';

if ($logas == "customer") {
	$sql1 = "SELECT email,first_name FROM coustomers where first_name='$first_name' AND email='$email' ;";
	$result = $conn->query($sql1);
	if ($result->num_rows == 0) {
		$sql = "INSERT INTO coustomers (first_name, last_name,password,email,phone,country)
        		VALUES ('$first_name','$last_name','$pwd1','$email','$phone','$country');";
	} else {
		echo("your name is already taken");
		exit();		
	}

} else {
	$sql1 = "SELECT email,first_name FROM seller where first_name='$first_name' AND email='$email' ;";
	$result = $conn->query($sql1);
	if ($result->num_rows == 0) {
		$sql = "INSERT INTO seller (first_name, last_name,password,email,phone,country)
       			VALUES ('$first_name','$last_name','$pwd1','$email','$phone','$country');";
	} else {

	}
}

if (mysqli_query($conn, $sql)) {

	header('location: http://localhost/test/main/Pages/profile.html'); //?=page you will go when submetion is correct
} else {

	echo 'ERROR :' . mysqli_error($conn);
}








?>