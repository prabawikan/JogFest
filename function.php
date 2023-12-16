<?php

include 'koneksi.php';

// function query($query)
// {
//   global $conn;

//   if(isset($_GET['search'])){

//     $search = $_GET['search'];

//     $query = "SELECT * FROM event WHERE judul LIKE '%$search%'";
//   }

//   $result = mysqli_query($conn, $query);
//   $rows = [];
//   while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row; // Perbaikan disini, menggunakan $rows[]
//   }
//   return $rows;
// }

function query($query)
{
  global $conn;

  if(isset($_GET['search'])) {
    $search = $_GET['search'];
    $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

    $query = "SELECT * FROM event WHERE judul LIKE '%$search%'";

    if (!empty($tanggal)) {
      $query .= " AND tanggal = '$tanggal'";
    }
  }

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
