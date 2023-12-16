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
      <form class="form" id="b-form" method="post" action="login_p.php">
        <h2 class="form_title title">Sign in to ADMIN</h2>
        <input class="form__input" type="text" placeholder="Username" name="username" />
        <input class="form__input" type="password" placeholder="Password" name="pwd" />

        <button type="submit" class="form__button button submit" name="login">SIGN IN</button>
        <a style="margin-top: 20px; text-decoration:underline;" href="login.php">Login User</a>
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