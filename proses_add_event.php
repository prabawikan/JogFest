<?php
session_start();
if (!isset($_POST['judul'])) {
  header('Location:add-event.php');
  exit;
}
include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$judul = $_POST['judul'];
$isi = $_POST['isi'];
$lokasi = $_POST['lokasi'];
$kategori = $_POST['kategori'];
$tanggal = $_POST['tanggal'];
$harga = $_POST['harga'];


$dater2 = date_create("$tanggal");
$tanggal = date_format($dater2, "Y-m-d");



if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"] == "") {
  $newfilename = "-";
  $insert_query2 = mysqli_query($conn, "INSERT INTO `event` (`id_event`, `judul`, `isi`, `lokasi`, `gambar`, `id_kategori`, `harga`, `tanggal`) VALUES (NULL, '$judul', '$isi', '$lokasi', '$newfilename', '$kategori', '$harga', '$tanggal'); ");
  if ($insert_query2) {
    echo "<script>
    alert ('Event berhasil ditambahkan');
    </script>";
    echo "<meta http-equiv='refresh' content='0;url=event.php'>";
  } else {
    echo "<script>
    alert ('Event gagal ditambahkan');
    </script>";
    echo "<meta http-equiv='refresh' content='0;url=add-event.php'>";
  }
} else {
  $target_dir = "assets/images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if image file is a actual image or fake image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }

  // // Check if file already exists
  // if (file_exists($target_file)) {
  //   $uploadOk = 0;
  // }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 10044070) {
    $uploadOk = 0;
  }

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png") {
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "<script>
            alert ('Cek Ukuran File, Tipe File');
            </script>";

    echo "<meta http-equiv='refresh' content='0;url=add-event.php'>";

  } else {
    // $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    // $newfilename = round(microtime(true)) . '.' . end($temp);

    $newfilename = $_FILES["fileToUpload"]["name"];


    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)) {

      $insert_query2 = mysqli_query($conn, "INSERT INTO `event` (`id_event`, `judul`, `isi`, `lokasi`, `gambar`, `id_kategori`, `harga`, `tanggal`) VALUES (NULL, '$judul', '$isi', '$lokasi', '$newfilename', '$kategori', '$harga', '$tanggal');");

      if ($insert_query2) {
        echo "<script>
  alert ('Event berhasil ditambahkan');
  </script>";
        echo "<meta http-equiv='refresh' content='0;url=event.php'>";
      } else {
        echo "<script>
  alert ('Event gagal ditambahkan');
  </script>";
        echo "<meta http-equiv='refresh' content='0;url=add-event.php'>";
      }
    } else {
      echo "<script>
            alert ('Sorry, there was an error uploading your file');
            </script>";
      // echo "<meta http-equiv='refresh' content='0;url=add-event.php'>";
    }
  }
}



//--------------------------------------------------------------------------------------------------------------------------









?>