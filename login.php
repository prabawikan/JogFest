<?php
// session_start();

// if(isset($_SESSION["login"])) {
//   header("Location: index.php");;
//   exit;
// }

require('function-login-register.php');

if(isset($_POST["login"])){
  $username = $_POST['loginUsername'];
  $password = $_POST['loginPassword'];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])){
      //set session
      $_SESSION["login"] = true;

      header("Location: index.php");
      exit;

    } else {
      $error = true; // Set $error ke true jika password tidak cocok
    }
  } else {
    $error = true; // Set $error ke true jika username tidak ditemukan
  }
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="assets/css/login-register.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;800&display=swap" rel="stylesheet" />
  </head>
  <body>
    <div class="main">
      <div class="container b-container" id="b-container">
        <form class="form" id="b-form" method="post" action="">
          <h2 class="form_title title">Sign in to Website</h2>
          <input class="form__input" type="text" placeholder="Username" name="loginUsername" />
          <input class="form__input" type="password" placeholder="Password" name="loginPassword" />
          <?php if(isset($error)) : ?>
            <p>username atau password salah</p>
          <?php endif; ?>

          <button class="form__button button submit" name="login">SIGN IN</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Welcome Back !</h2>
          <p class="switch__description description">To keep connected with us please login with your personal info</p>
          <!-- <button href="register.php" class="switch__button button switch-btn">SIGN IN</button> -->
          <a href="register.php" class="btn-form">SIGN UP</a>
        </div>
      </div>
    </div>
    <!-- <script src="assets/js/login-register.js"></script> -->
  </body>
</html>
