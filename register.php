<?php

require('function-login-register.php');

if(isset($_POST["register"])){
  if (registrasi($_POST) > 0){
    echo "<script> 
        alert('akun berhasil ditambah')
        </script>";
  } else{
    echo mysqli_error($conn);
  }
}

// if(isset($_POST["login"])){
//   $username = $_POST['username'];
//   $password = $_POST['password'];

//   $result = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");

//   //cek username
//   if(mysqli_num_rows($result) === 1){

//     $row = mysqli_fetch_assoc($result);
//     if (password_verify($password, $row["password"])){
//       header("Location: index.php");
//       exit;
//     }
//   }
// }

// $error = true;
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
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="post" action="">
          <h2 class="form_title title">Create Account</h2>
          <input class="form__input" type="text" placeholder="Name" name="name" id="name" />
          <input class="form__input" type="text" placeholder="Username" name="username" id="username" />
          <input class="form__input" type="password" placeholder="Password" name="password" id="password" />
          <button type="submit" class="form__button button submit" name="register">SIGN UP</button>
        </form>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Hello Friend !</h2>
          <p class="switch__description description">Enter your personal details and start journey with us</p>
          <a href="login.php" class="btn-form">SIGN IN</a>
        </div>
      </div>
    </div>
    <!-- <script src="assets/js/login-register.js"></script> -->
  </body>
</html>
