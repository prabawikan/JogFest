<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['pwd'];
$password = md5($password);



$prevQuery = mysqli_query($conn, "SELECT * FROM admin1 WHERE username = '$username'");
$data = mysqli_fetch_array($prevQuery, MYSQLI_ASSOC);

if ($password == $data['password'])
{
    $_SESSION['admin'] = $data['id_admin'];
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
	exit;
}
else
echo "<script>
	alert ('Login Gagal');
	</script>";
	    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=login-admin.php">';

?>
