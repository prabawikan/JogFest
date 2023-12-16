<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kategori'])) {
  $id_kategori = $_POST['id_kategori'];
  $nama_kategori = $_POST['kategori'];

  // Update data kategori di database
  $update_query = mysqli_query($conn, "UPDATE `kategori` SET `nama_kategori` = '$nama_kategori' WHERE `id_kategori` = '$id_kategori'");

  if ($update_query) {
    echo "<script>
                alert ('Kategori berhasil diupdate');
            </script>";
    echo "<meta http-equiv='refresh' content='0;url=kategori.php'>";
  } else {
    echo "<script>
                alert ('Kategori gagal diupdate');
            </script>";
    echo "<meta http-equiv='refresh' content='0;url=edit_kategori.php?id=$id_kategori'>";
  }
} else {
  // Redirect jika tidak ada parameter ID yang diberikan
  header('Location: kategori.php');
  exit;
}
?>