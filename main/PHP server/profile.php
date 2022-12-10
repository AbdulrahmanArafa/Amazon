<?php 	
	include('config.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	
		//to prevent from mysqli injection
		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$username = mysqli_real_escape_string($con, $username);
		$password = mysqli_real_escape_string($con, $password);
	
		$sql = "select *from login where username = '$username' and password = '$password'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		
		if($count == 1){
			echo "<h1><center> Login successful </center></h1>";
		}
		else{
			echo "<h1> Login failed. Invalid username or password.</h1>";
		}	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/maincss .css">
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="stylesheet" href="../CSS/all.min.css">


    <title>One place:sign in</title>
</head>

<body>
    <div class="login">
        <div class="logo-login">
            <a href="../index.html"><img src="../imges/light-mode-edited-removebg-preview (1).svg"></a>
        </div>
        <h2>Login</h2>
        <form method="post" action="" class="login-form">
            <div class="text-field">
                <input type="text" name="username" id="name" placeholder="User Name" required>
                <span><i class="fa-solid fa-user"></i></span>
            </div>
            <div class="text-field">
                <input type="password" name="password" id="password " placeholder="Password" required>
                <span><i class="fa-solid fa-lock"></i> </span>
            </div>

            <button type="submit" id="submit" class="button" onmousedown="buttonClick()">login
                <div id="splash"></div>
            </button>



            <div class="text">
                <span>By Login, you agree to one place's <a>Conditions of Use</a> and <a>Privacy Notice</a>.</span>
                <div class="need">
                    <i class="fa-solid fa-square-caret-right"></i>
                    <span class="show-help"> Need help?</span>
                    <input id="toggle" type="checkbox" checked>
                    <div class="drop-list" id="#show">
                        <a href="sign Up.html">
                            <p> Don't have account</p>
                        </a>
                        <a>
                            <p> Forgot your password?</p>
                        </a>
                        <a>
                            <p> Other issues with Sign-In</p>
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>


    <script src="../JS/btr.js">

    </script>
</body>

</html>