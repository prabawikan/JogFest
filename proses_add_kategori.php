<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $kategori = $_POST['kategori'];

    // Insert data ke database
    $insert_query = mysqli_query($conn, "INSERT INTO `kategori` (`nama_kategori`) VALUES ('$kategori')");

    if ($insert_query) {
        echo "<script>
                alert ('Kategori berhasil ditambahkan');
            </script>";
        echo "<meta http-equiv='refresh' content='0;url=kategori.php'>";
    } else {
        echo "<script>
                alert ('Kategori gagal ditambahkan');
            </script>";
        echo "<meta http-equiv='refresh' content='0;url=add_kategori.php'>";
    }
}
?>
