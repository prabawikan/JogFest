<?php
session_start();

// Contoh koneksi ke database (pastikan file ini atau file terpisah sudah ada koneksi ke database)
require('function-login-register.php');

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['login']) || !$_SESSION['login']) {
  // Jika belum login, redirect ke halaman login
  header("Location: login.php");
  exit;
}

// Ambil data pengguna dari database (gantilah ini dengan metode yang sesuai)
$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $user_id");
$user_data = mysqli_fetch_assoc($result);

// Cek jika data pengguna ditemukan
if (!$user_data) {
  echo "Data pengguna tidak ditemukan!";
  exit;
}
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0" />
  <meta charset="utf-8" />
  <title>Profile Page</title>
  <!-- Tambahkan CSS atau gaya tambahan di sini -->

  <link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet" />
  <style>
    body {
      font-family: "Poppins";
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      background-color: #f0f0f0;
    }

    .profile-container {
      color: white;
      max-width: 400px;
      width: 100%;
      margin: auto;
      padding: 20px;
      border-radius: 10px;
      background-color: #2a2a2a;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-container h2 {
      color: #white;
      text-align: center;
    }

    .profile-info {
      margin-top: 20px;
    }

    .profile-info p {
      margin: 10px 0;
    }

    a {
      display: block;
      margin-top: 30px;
      text-align: center;
      text-decoration: none;
      color: white;
      font-weight: bold;
      transition: color 0.3s ease;
      background-color: black;
      padding: 5px;
      border-radius: 110px;
    }

    a:hover {
      color: white;
    }
  </style>
</head>

<body>
  <div class="profile-container">
    <h2>Profile Page</h2>
    <div class="profile-info">
      <p><strong>Nama:</strong>
        <?php echo $user_data['nama']; ?>
      </p>
      <p><strong>Username:</strong>
        <?php echo $user_data['username']; ?>
      </p>
      <!-- Tambahkan informasi profil lainnya sesuai kebutuhan -->
    </div>
    <a href="logout.php">Logout</a>
  </div>
</body>

</html>