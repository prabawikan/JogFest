<?php
$id = $_GET['id'];
session_start();
include "koneksi.php";
date_default_timezone_set('Asia/Bangkok');
$target_dir = "assets/images/";
$get_data = mysqli_query($conn, "SELECT gambar FROM event where id_event=$id");
$hasil = mysqli_fetch_array($get_data, MYSQLI_ASSOC);
if ($hasil['gambar'] <> "-") {
  unlink("assets/images/" . $hasil['gambar']);
}


$query = mysqli_query($conn, "DELETE from event where id_event=$id");
echo "<script>
	alert ('Event berhasil dihapus');
	</script>";
echo "<meta http-equiv=refresh content=0;url=event.php>";
?>


