<?php
setcookie("cooki","test",time()+1,900,800,"/","localhost",TRUE,TRUE);
session_start()
include('./connection.php');


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$logas = $_POST['logas'];
$country = 'Egypt';
if(isset(_$_POST['submit']))
{
	if ($logas == "customer")
	 {
    	$sql = "INSERT INTO coustomers (first_name, last_name,password,email,phone,country)
        		VALUES ('$first_name','$last_name,$pwd1$email','$phone','$country')";
	 } 
	else
	 {
    	$sql = "INSERT INTO seller (first_name, last_name,password,email,phone,country)
       			VALUES ('$first_name','$last_name,$pwd1$email','$phone','$country')";
	 }
		if(empty($firstName))
			{echo 'please enter first name';}	
		elseif(empty($lastName))
			{echo 'please enter last name';}	
		elseif(empty($password))
			{echo 'please enter password';}	
		elseif(empty($email))
			{echo 'please enter email';}	
		elseif(empty($gender))
			{echo 'please enter gender';}	
		elseif(empty($country))
			{echo 'please enter country';}
		elseif(empty($address))
			{echo 'please enter address';}
		elseif(empty($phone))
			{echo 'please enter phone';}

		elseif(empty($delivery_man_coustomer_no))
			{echo 'please enter delivery_man_coustomer_no';}
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{echo 'please enter a vaild email';}		
		
		else
		{
			if (mysqli_query($conn, $sql))
			{
			header('location: ?');//?=page you will go when submetion is correct
			}
			else
			{	
			echo'ERROR :'. mysqli_error($conn)
			}
		}	

}






?>