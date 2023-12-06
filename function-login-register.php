<?php
include 'koneksi.php'; 
function registrasi($data){
  global $conn;

  $nama = $data["name"];  
  $username =strtolower(stripslashes($data["username"]));
  $password =$data["password"];

  $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
  if(mysqli_fetch_assoc($result)){
    echo "<script> 
        alert('username sudah terdaftar')
        </script>";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambah user ke database
  mysqli_query($conn, "INSERT INTO user VALUES ('', '$nama', '$username', '$password')");
  mysqli_affected_rows($conn);

  return mysqli_affected_rows($conn);
}

?>