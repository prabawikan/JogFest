if(isset($_POST["login"])){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");

  //cek username
  if(mysqli_num_rows($result) === 1){

    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])){
      header("Location: index.php");
      exit;
    }
  }
}