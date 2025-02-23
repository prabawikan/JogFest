<?php

session_start();

// if(!isset($_SESSION["login"])) {
//   header("Location: login.php");;
//   exit;
// }

include 'koneksi.php';
require 'function.php'
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="Tooplate" />
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">


  <title>JOGFest - Tickets Page</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" />

  <link rel="stylesheet" href="assets/css/tooplate-artxibition.css" />
  <!--

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

-->

  <style>
    .btn-cari {
      padding: 0 30px;
    }
  </style>

</head>

<body>
  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">JOG<em>Fest</em></a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="berita_page.php">News</a></li>
              <li><a href="tickets.php" class="active">Tickets</a></li>
              <li><a href="about.php">About Us</a></li>
              <?php
              // Periksa apakah pengguna sudah login
              if (isset($_SESSION['user_id'])) {
                // Tampilkan ikon profil dan menu logout
                echo '<li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>';
              } else {
                // Jika belum login, tampilkan tombol login
                echo '<li><a style="background-color: #2a2a2a; padding: 0 20px; color:white; border-radius: 20px" class="btn-login" href="login.php">Login</a></li>';
              }
              ?>
            </ul>
            <a class="menu-trigger">
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** About Us Page ***** -->
  <div class="page-heading-shows-events">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2>Tickets On Sale Now!</h2>
          <span>Check out upcoming and past shows & events and grab your ticket right now.</span>
        </div>
      </div>
    </div>
  </div>

  <div class="tickets-page" id="tickets-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading">
            <h2>Tickets Page</h2>
          </div>
        </div>


        <div class="col-lg-12">

          <form action="tickets.php" method="GET">
            <div class="input-group mb-3">
              <input name="search" type="text" class="form-control" placeholder="Cari Event"
                style="border-radius:100px 0 0 100px">
              <input name="tanggal" type="date" class="form-control" placeholder="Filter by Date"
                style="border-radius:0 100px 100px 0">
              <button class="btn btn-dark ml-3 btn-cari" type="submit" style="border-radius:100px">Cari</button>
            </div>
          </form>


        </div>

        <?php
        // $result = mysqli_query($conn, 'SELECT * FROM event');
        $rows = query("SELECT e.*, k.nama_kategori
        FROM event e
        LEFT JOIN kategori k ON e.id_kategori = k.id_kategori
        ORDER BY e.id_event DESC");
        ?>
        <?php
        ?>

        <div class="col-lg-12">
          <?php if (empty($rows)): ?>
            <p>Tidak ada hasil</p>
          <?php else: ?>
            <?php foreach ($rows as $row): ?>
              <div class="col-lg-4">
                <!-- Your existing code to display tickets here -->
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

        <?php foreach ($rows as $row): ?>
          <div class="col-lg-4">
            <div class="ticket-item"
              style="border: 2px solid white;border-radius:20px;overflow:hidden;box-shadow: 0px 10px 15px -10px rgba(0, 0, 0, 0.5);"
              id="ticket-item-template">
              <div class="thumb">
                <img src="assets/images/<?php echo $row["gambar"]; ?>" alt="" class="ticket-image" />
                <?php echo $row["nama_kategori"] ?>
                <div class="price" style=" padding:10px; border-radius: 5px">
                  <span>
                    <em class="ticket-price" style="font-size:16px;">
                      Rp.
                      <?php echo $row["harga"]; ?>
                    </em></span>
                </div>
              </div>
              <div class="down-content" style="background-color:#f7f7f7;">
                <span class=" tickets-left"></span>
                <h4 class="event-name text-left">
                  <?php echo $row["judul"]; ?>
                </h4>
                <ul>
                  <li>
                    <i class="fa fa-clock-o"></i> <span class="event-time">
                      <?php echo $row["tanggal"]; ?>
                    </span>
                  </li>
                  <li>
                    <i class="fa fa-map-marker"></i> <span class="venue"></span>
                    <?php echo $row["lokasi"]; ?>
                  </li>
                </ul>
                <div class="main-dark-button">
                  <a href="ticket-details.php?id_event=<?php echo $row["id_event"]; ?>">Beli Tiket</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>



  <!-- *** Footer *** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="sub-footer">
            <div class="row">
              <div class="col-lg-3">
                <div class="logo">
                  <span>JOG<em>Fest</em></span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="menu">
                  <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="berita_page.php">News</a></li>
                    <li><a href="tickets.php" class="active">Tickets</a></li>
                    <li><a href="about.php">About Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="social-links">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-behance"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-instagram"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="assets/js/jquery-2.1.0.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/scrollreveal.min.js"></script>
  <script src="assets/js/waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/imgfix.min.js"></script>
  <script src="assets/js/mixitup.js"></script>
  <script src="assets/js/accordions.js"></script>
  <script src="assets/js/owl-carousel.js"></script>


  <!-- Global Init -->
  <script src="assets/js/custom.js"></script>

</body>

</html>