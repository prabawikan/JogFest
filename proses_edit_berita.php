<?php
session_start();

if (!isset($_POST['judul'])) {
  header('Location: berita.php');
  exit;
}

include "koneksi.php";

date_default_timezone_set('Asia/Bangkok');

$id_berita = $_POST['id_berita'];
$judul = $_POST['judul'];
$isi = $_POST['isi'];
$kategori = $_POST['kategori'];
$tanggal = $_POST['tanggal'];


$dater2 = date_create("$tanggal");
$tanggal = date_format($dater2, "Y-m-d");

// Cek apakah gambar baru diunggah
if ($_FILES['fileToUpload']['size'] == 0 && $_FILES['fileToUpload']['error'] == 0 || $_FILES["fileToUpload"]["name"] == "") {
  // Tidak ada gambar baru, update tanpa mengubah gambar
  $update_query2 = mysqli_query($conn, "UPDATE `berita` SET 
                                            judul='$judul', 
                                            isi='$isi', 
                                            id_kategori='$kategori', 
                                            tanggal='$tanggal' 
                                          WHERE id_berita=$id_berita");

  if ($update_query2) {
    echo "<script>
                alert ('Berita berhasil diperbarui');
            </script>";
    echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
  } else {
    echo "<script>
                alert ('Berita gagal diperbarui');
            </script>";
    echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
  }
} else {
  // Ada gambar baru, proses pengunggahan dan update
  $target_dir = "assets/images/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if file size exceeds limit
  if ($_FILES["fileToUpload"]["size"] > 10044070) {
    $uploadOk = 0;
  }

  // Allow certain file formats
  if ($imageFileType != "jpg" && $imageFileType != "png") {
    $uploadOk = 0;
  }

  // Cek apakah $uploadOk diatur 0 karena adanya error
  if ($uploadOk == 0) {
    echo "<script>
                alert ('Cek Ukuran File, Tipe File');
            </script>";

    echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
  } else {
    // Proses pengunggahan gambar baru
    $newfilename = $_FILES["fileToUpload"]["name"];

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "$target_dir" . $newfilename)) {
      $update_query2 = mysqli_query($conn, "UPDATE `berita` SET 
                                                    judul='$judul', 
                                                    isi='$isi', 
                                                    gambar='$newfilename', 
                                                    id_kategori='$kategori', 
                                                    tanggal='$tanggal' 
                                                  WHERE id_berita=$id_berita");

      if ($update_query2) {
        echo "<script>
                        alert ('Berita berhasil diperbarui');
                    </script>";
        echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
      } else {
        echo "<script>
                        alert ('Berita gagal diperbarui');
                    </script>";
        echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
      }
    } else {
      echo "<script>
                    alert ('Maaf, terdapat kesalahan saat mengunggah file Anda');
                </script>";
      echo "<meta http-equiv='refresh' content='0;url=berita.php'>";
    }
  }
}
?>