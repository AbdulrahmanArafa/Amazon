<?php
include('./config.php');

$username = $_POST['username'];
$pwd = $_POST['pwd1'];

$sql1 = "SELECT * FROM coustomers where first_name='$username' or email='$username' ;";
$result = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM seller where first_name='$username' or email='$username' ;";
$result2 = mysqli_query($conn, $sql2);

$seller = mysqli_fetch_array($result2, MYSQLI_ASSOC);
$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($user) {

  if ($pwd == $user['password']) {
    // start cookie
    $Name = $user['first_name'];
    setcookie('userName', $Name, time() + 3600, "/"); /* expire in 1 hour */
    setcookie('email', $user['email'], time() + 3600, "/");
    setcookie('coustomer', $user['coustomer_id'], time() + 3600, "/");
    session_start();

    // user information pass to session 
    $_SESSION["user"] = $Name;
    $_SESSION["id"] = $user['coustomer_id'];
    $_SESSION["email"] = $user['email'];
    $_SESSION["ph"] = $user['phone'];

    header("Location: http://localhost/test/main/");
    die();
  } else {
    echo "<div>Password does not match</div>";
  }
} else if ($seller) {
  if ($pwd == $seller['password']) {
    $Name = $seller['first_name'];
    $id = $seller['seller_id'];

    setcookie('userName', $Name, time() + 3600, "/"); /* expire in 1 hour */
    setcookie('email', $seller['email'], time() + 3600, "/");
    setcookie('seller', $id, time() + 3600, "/");

    session_start();
    $_SESSION["first_name"] = $Name;
    $_SESSION["email"] = $seller['email'];
    $_SESSION["seller_id"] = $id;



    header("Location: http://localhost/test/main/");
    die();
  } else {
  }

}

?>














<!-- this unseesry code just for design and  it's made by fifowskaw  -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>invalid Password or username</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <main>
    <div class="inside">
      <div class="cloud-big"></div>
      <div class="cloud-small"></div>
      <div class="bird">
        <div class="bird_eyes">
          <div class="bird_eyes-eye"></div>
          <div class="bird_eyes-eye"></div>
        </div>
        <div class="bird_beak">
          <div class="bird_beak-upper"></div>
          <div class="bird_beak-under"></div>
        </div>
        <div class="bird_feets">
          <div class="birds_feets-feet"></div>
          <div class="birds_feets-feet"></div>
        </div>
      </div>
      <div class="hands">
        <div class="hands-hand"></div>
        <div class="hands-hand"></div>
      </div>
      <div class="line"></div>
      <div class="hills">
        <div class="hill"></div>
        <div class="hill"></div>
        <div class="hill"></div>
      </div>
    </div>
  </main>
  <footer>
    <h1>please back to log in page and try agin </h1>
    <p>
      invalid Password or username is invalid
    </p>
    <p>
      or go to sign up
      <a href="../Pages/sign Up.html"> page</a>
    </p>

  </footer>
</body>

</html>
<style>
  :root {
    --color-black: black;
    --color-dark-grey: rgb(34, 32, 32);
    --color-grey: rgb(86, 115, 128);
    --color-blueish-grey: rgb(143, 176, 201);
    --color-light-grey: rgb(187, 211, 226);

    --color-cloud-1: #f2f9fe;
    --color-cloud-2: #bbd6e4;

    --color-turquoise: #11e7d7;
    --color-turquoise2: #31bfae;
    --color-turquoise3: #01c7be;
    --color-turquoise4: #01c7be;

    --color-orange: #f8c14d;
    --color-orange2: #f7d35d;
    --color-orange3: #eb9f2d;

    --color-green: #aad95d;
    /*rgb(101, 173, 67);*/
    --color-green2: #a9b154;
    /*rgb(56, 112, 30);*/

    --color-light-red: rgb(233, 195, 173);
    --color-white: white;
    --color-white-trans: rgba(255, 255, 255, 0.8);

    --time-0: 0s;
    --time-0-1s: 0.1s;
    --time-0-4s: 0.4s;
    --time-1-8s: 1.8s;
    --time-1-0s: 1s;
    --time-10s: 10s;

    --time-cloud-big: 10s;
    --time-cloud-small: 14s;

    --width-height: 500px;
  }

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  *::after,
  *::before {
    position: absolute;
    content: "";
  }

  body {
    width: 100vw;
    height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

    background-color: #ECEEFA;
  }

  main {
    width: var(--width-height);
    height: var(--width-height);

    border-radius: 100%;
    border: 25px solid var(--color-light-red);

    background: linear-gradient(var(--color-grey),
        var(--color-blueish-grey),
        var(--color-light-grey));

    display: flex;
    justify-content: center;
    align-items: center;

    overflow: hidden;
  }

  /* Glass-like line */
  .inside {
    position: relative;
    width: calc(var(--width-height) * 0.85);
    height: calc(var(--width-height) * 0.85);

    display: flex;
    justify-content: center;
    align-items: center;
  }

  .inside::before {
    width: 100%;
    height: 100%;

    border: 12px solid transparent;
    border-right: 13px solid rgba(255, 255, 255, 0.3);

    box-sizing: border-box;
    border-radius: 50%;
    z-index: 10;
  }

  .inside::after {
    top: 10%;
    right: 17%;

    width: 20px;
    height: 20px;
    background-color: rgba(255, 255, 255, 0.3);

    border-radius: 100%;
  }

  /* Clouds */
  .cloud-big,
  .cloud-small {
    position: absolute;

    background: linear-gradient(to bottom,
        var(--color-cloud-1),
        var(--color-cloud-2));

    border-radius: 30px;
  }

  .cloud-big::after,
  .cloud-big::before,
  .cloud-small::after,
  .cloud-small::before {
    background: linear-gradient(to bottom,
        var(--color-cloud-1),
        var(--color-cloud-2));
    border-radius: 100%;
  }

  .cloud-big {
    z-index: 3;
    top: 20%;
    left: 0;

    width: calc(var(--width-height) * 0.25);
    height: calc(var(--width-height) * 0.1);

    animation: cloud-big-move var(--time-cloud-big) infinite linear;
  }

  .cloud-big::after {
    top: -40%;
    right: 10%;
    width: calc(var(--width-height) * 0.12);
    height: calc(var(--width-height) * 0.12);
  }

  .cloud-big::before {
    top: -20%;
    left: 15%;
    width: calc(var(--width-height) * 0.1);
    height: calc(var(--width-height) * 0.1);
  }

  @keyframes cloud-big-move {
    from {
      transform: translateX(-100%);
    }

    to {
      transform: translateX(350%);
    }
  }

  .cloud-small {
    z-index: 2;
    top: 10%;
    left: 0;

    width: calc(var(--width-height) * 0.15);
    height: calc(var(--width-height) * 0.07);

    animation: cloud-small-move var(--time-cloud-small) infinite linear;
  }

  .cloud-small::after {
    top: -40%;
    right: 10%;
    width: calc(var(--width-height) * 0.08);
    height: calc(var(--width-height) * 0.08);
  }

  .cloud-small::before {
    top: -20%;
    left: 15%;
    width: calc(var(--width-height) * 0.06);
    height: calc(var(--width-height) * 0.06);
  }

  @keyframes cloud-small-move {
    from {
      transform: translateX(-70%);
    }

    to {
      transform: translateX(550%);
    }
  }

  /* BIRD */
  .bird {
    position: relative;
    width: calc(var(--width-height) * 0.4);
    height: calc(var(--width-height) * 0.4);

    background: radial-gradient(var(--color-turquoise), var(--color-turquoise2));

    border-radius: 100%;

    display: flex;
    justify-content: center;
    align-items: center;

    z-index: 5;
  }

  /* Bird's eyes */
  .bird_eyes {
    position: absolute;
    top: calc(var(--width-height) * 0.08);
    left: calc(var(--width-height) * 0.025);

    width: calc(var(--width-height) * 0.35);
    height: calc(var(--width-height) * 0.12);

    background-color: transparent;

    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  .bird_eyes-eye {
    position: relative;
    width: calc(var(--width-height) * 0.12);
    height: calc(var(--width-height) * 0.12);

    background-color: var(--color-white);
    border-radius: 100%;

    /* box-shadow: 1px 7px 10px var(--color-blueish-grey); */

    overflow: hidden;
  }

  .bird_eyes-eye::before {
    bottom: 10px;

    width: 18px;
    height: 18px;

    border-radius: 100%;
    background-color: black;
  }

  .bird_eyes>div:nth-child(1)::before {
    left: 22px;
  }

  .bird_eyes>div:nth-child(2)::before {
    left: 17px;
  }

  .bird_eyes>div:nth-child(1)::after,
  .bird_eyes>div:nth-child(2)::after {
    width: 250px;
    height: 250px;

    background: radial-gradient(transparent 0%,
        transparent 30%,
        var(--color-turquoise4) 31%,
        var(--color-turquoise) 100%);
  }

  .bird_eyes>div:nth-child(1)::after {
    top: -30px;
    left: -70px;

    animation: left-eye-blink var(--time-10s) infinite;
  }

  .bird_eyes>div:nth-child(2)::after {
    top: -30px;
    right: -70px;

    animation: right-eye-blink var(--time-10s) infinite;
  }

  @keyframes left-eye-blink {
    0% {
      transform: translateY(0px);
    }

    10% {
      transform: translateY(5px);
    }

    20% {
      transform: translateY(0px);
    }

    30% {
      transform: translateY(-5px);
    }

    40% {
      transform: translateY(-5px);
    }

    50% {
      transform: translateY(10px);
    }

    80% {
      transform: translateY(0px);
    }

    90% {
      transform: translateY(-40px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  @keyframes right-eye-blink {
    0% {
      transform: translateY(0px);
    }

    10% {
      transform: translateY(5px);
    }

    20% {
      transform: translateY(0px);
    }

    30% {
      transform: translateY(-5px);
    }

    40% {
      transform: translateY(-5px);
    }

    50% {
      transform: translateY(10px);
    }

    80% {
      transform: translateY(0px);
    }

    90% {
      transform: translateY(-40px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  /* Bird's beak */
  .bird_beak {
    position: relative;
    margin-top: 40px;
    width: calc(var(--width-height) * 0.1);
    height: calc(var(--width-height) * 0.1);
  }

  .bird_beak-upper {
    width: 100%;
    height: 100%;

    background-color: var(--color-orange2);
    border-radius: 50% 50% 10% 90% / 50% 90% 10% 50%;

    transform: rotate(45deg);

    z-index: 10;
  }

  .bird_beak::after {
    top: 10%;
    left: 30%;

    width: 40%;
    height: 15%;

    background-color: var(--color-white-trans);
    border-radius: 100%;
  }

  .bird_beak-under {
    position: absolute;
    top: 15px;
    left: 2.5px;
    width: 90%;
    height: 90%;

    background-color: var(--color-orange3);
    border-radius: 50% 50% 20% 80% / 50% 80% 20% 50%;

    transform: rotate(45deg);

    z-index: -1;
  }

  .bird_beak::before {
    top: 25px;
    left: 2.5px;
    width: 90%;
    height: 90%;

    background-color: var(--color-turquoise2);
    border-radius: 50% 50% 30% 70% / 50% 70% 30% 50%;

    transform: rotate(45deg);
    z-index: -2;
  }

  /* Bird's hands */

  .hands {
    position: absolute;
    top: 43%;

    width: calc(var(--width-height) * 0.41);
    height: calc(var(--width-height) * 0.2);

    background-color: transparent;

    animation: move-hands var(--time-10s) infinite;
  }

  .hands-hand {
    position: absolute;
    width: 30px;
    height: 100%;

    background: radial-gradient(var(--color-turquoise), var(--color-turquoise2));

    border-radius: 100%;
  }

  .hands>div:nth-child(1) {
    left: 0px;
  }

  .hands>div:nth-child(2) {
    right: 0px;
  }

  @keyframes move-hands {
    0% {
      transform: translateY(0px);
    }

    80% {
      transform: translateY(0px);
    }

    90% {
      transform: translateY(-10px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  /* Bird's feets */
  .bird_feets {
    position: absolute;

    bottom: -25px;

    width: calc(var(--width-height) * 0.27);
    height: calc(var(--width-height) * 0.1);

    background-color: transparent;

    display: flex;

    animation: move-feets var(--time-10s) infinite;
  }

  .birds_feets-feet {
    position: absolute;

    width: 40px;
    height: 30px;

    background: radial-gradient(var(--color-orange2), var(--color-orange3));

    border-radius: 100%;
  }

  .bird_feets>div:nth-child(1) {
    left: 0;
  }

  .bird_feets>div:nth-child(2) {
    right: 0;
  }

  @keyframes move-feets {
    0% {
      transform: translateY(0px);
    }

    80% {
      transform: translateY(0px);
    }

    90% {
      transform: translateY(10px);
    }

    100% {
      transform: translateY(0px);
    }
  }

  /* Line */
  .line {
    position: absolute;
    top: -65%;

    width: calc(var(--width-height) * 1.2);
    height: calc(var(--width-height) * 1.2);

    background-color: transparent;

    border-radius: 100%;
    border: 5px solid var(--color-black);
  }

  /* Hills */
  .hills {
    position: absolute;
    top: calc(var(--width-height) * 0.6);

    width: calc(var(--width-height) * 0.85);
    height: calc(var(--width-height) * 0.5);

    background-color: transparent;
  }

  .hill {
    position: absolute;

    border-radius: 100%;
    background: radial-gradient(ellipse at top right,
        var(--color-green2),
        var(--color-green));
  }

  .hills>div:nth-child(1) {
    width: calc(var(--width-height) * 0.5);
    height: calc(var(--width-height) * 0.3);

    left: 0;
    top: 25%;

    transform: rotate(20deg);
    z-index: 8;
  }

  .hills>div:nth-child(2) {
    width: calc(var(--width-height) * 0.4);
    height: calc(var(--width-height) * 0.2);

    right: 5%;
    top: 35%;

    transform: rotate(-20deg);

    z-index: 10;
  }

  .hills>div:nth-child(3) {
    width: calc(var(--width-height) * 0.2);
    height: calc(var(--width-height) * 0.3);

    top: 25%;
    left: 45%;

    background: radial-gradient(ellipse at top,
        var(--color-green2),
        var(--color-green));

    z-index: 5;
  }

  /* Description */

  footer {
    margin-top: 30px;
    text-align: center;

    letter-spacing: 2px;
    font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
    color: var(--color-green2);
  }

  footer a {
    text-decoration: none;
    color: var(--color-green);
  }

  footer h1 {
    margin-bottom: 20px;
  }

  footer p {
    font-size: 20px;
  }
</style>