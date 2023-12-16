<?php
include "koneksi.php";

$id_kategori = $_GET['id'];

// Periksa apakah ada acara yang masih menggunakan kategori
$check_event_query = mysqli_query($conn, "SELECT COUNT(*) as total_event FROM event WHERE id_kategori = $id_kategori");
$row = mysqli_fetch_assoc($check_event_query);
$total_event = $row['total_event'];

if ($total_event > 0) {
    // Jika ada acara yang masih menggunakan kategori, berikan alert
    echo "<script>
                alert('Tidak dapat menghapus kategori karena masih ada acara yang menggunakan kategori ini.');
                window.location.href='kategori.php';
          </script>";
} else {
    // Jika tidak ada acara yang masih menggunakan kategori, lanjutkan penghapusan
    $delete_kategori_query = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = $id_kategori");

    if ($delete_kategori_query) {
        echo "<script>
                    alert('Kategori berhasil dihapus');
                    window.location.href='kategori.php';
              </script>";
    } else {
        echo "<script>
                    alert('Gagal menghapus kategori');
                    window.location.href='kategori.php';
              </script>";
    }
}
?>