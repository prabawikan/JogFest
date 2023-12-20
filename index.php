<?php

include 'koneksi.php';
session_start();

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

  <title>JOGFest</title>

  <!-- Additional CSS Files -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" />

  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

  <link rel="stylesheet" href="assets/css/tooplate-artxibition.css" />

  <style>
    .item .kategori {
      background-color: white;
      margin: 30px;
    }

    .title {
      font-weight: bold;
      text-align: center;
      color: white;
      margin-bottom: 30px;
      font-size: 36px;
    }

    .coming-events {
      padding: 60px 0;
      background-color: #2a2a2a;
    }

    .header-content,
    .content {
      margin: 20px 20px;
    }

    .header-content {
      display: flex;
      justify-content: space-between;
    }

    .isi {
      font-size: 14px;
      line-height: 20px;
    }

    .read-more {
      font-size: 16px;
      font-weight: bold;
      margin-top: 10px;
      display: inline-block;
    }

    .read-more::after {
      content: '';
      display: block;
      padding-bottom: 0.5rem;
      border-bottom: 0.1rem solid #2a2a2a;
      transform: scaleX(0);
      transition: 0.2s linear;
    }

    .read-more:hover::after {
      transform: scaleX(0.5);
    }

    .berita-page-link {
      display: block;
    }
  </style>
</head>

<body>
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
              <li><a href="index.php" class="active">Home</a></li>
              <li><a href="berita_page.php">News</a></li>
              <li><a href="tickets.php">Tickets</a></li>
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

  <!-- ***** Main Banner Area Start ***** -->
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="main-content">
            <h6>Amazing events in YOGYAKARTA</h6>
            <h2>JOGFest</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  <!-- *** Owl Carousel Items ***-->


  <div class="show-events-carousel">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">

          <div class="owl-show-events owl-carousel">

            <?php
            // Ambil data kategori dari database
            $query = mysqli_query($conn, "SELECT * FROM kategori");

            // Loop melalui setiap kategori
            while ($kategori = mysqli_fetch_assoc($query)) {
              $nama_kategori = $kategori['nama_kategori'];
              ?>

              <div class="item" style="background-color: #2a2a2a;
                            margin: 30px;
                            text-align:center;
                            border:1px solid black;
                            box-shadow: 0 4px 4px rgba(0, 0, 0, 0.3);
                            border-radius:20px;">
                <a class="kategori" href="event-kategori.php?kategori=<?php echo urlencode($nama_kategori); ?>">
                  <h4 style="color:white;">
                    <?php echo $nama_kategori; ?>
                  </h4>
                </a>
              </div>

              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- *** Amazing Venus ***-->
  <div class="amazing-venues">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="left-content">
            <h4>Amazing events at JOGFest</h4>
            <p>
              Aplikasi yang menyajikan jadwal acara di Yogyakarta dengan lima kategori utama, yaitu musik, seni, budaya,
              olahraga, dan edukasi, memberikan pengguna kemudahan untuk menemukan berbagai kegiatan menarik yang sesuai
              dengan minat mereka. Dalam kategori musik, aplikasi ini menghadirkan informasi konser, festival, dan
              pertunjukan musik dari berbagai genre, sehingga pengguna dapat merencanakan partisipasi mereka dalam event
              musik yang sesuai dengan selera mereka. </p>
            <br />
            <p>
              Selain itu, aplikasi ini juga memuat acara seni yang melibatkan pameran seni rupa, pertunjukan teater, dan
              event seni pertunjukan lainnya. Dalam kategori budaya, pengguna dapat menemukan acara yang memperkenalkan
              kekayaan budaya lokal, seperti festival tradisional, upacara adat, dan pameran budaya. Untuk penggemar
              olahraga, aplikasi ini menyajikan informasi mengenai pertandingan, turnamen, dan kegiatan olahraga lainnya
              yang berlangsung di Yogyakarta. Terakhir, kategori edukasi mencakup seminar, lokakarya, dan kegiatan
              pembelajaran lainnya yang memberikan wawasan dan pengetahuan baru kepada pengguna. Dengan aplikasi ini,
              warga Yogyakarta dan pengunjung dapat dengan mudah menjelajahi dan mengikuti beragam acara yang
              berlangsung di kota ini, mendukung budaya lokal dan meningkatkan kualitas hidup komunitas.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- *** Coming Events ***-->
  <div class="coming-events">
    <div class="container">
      <h2 class="title">Event</h2>
      <a href="tickets.php" class="berita-page-link mb-4 text-center text-light">
        Lihat Semua Event <i class="fa-solid fa-arrow-right"></i>
      </a>

      <div class="row">


        <?php
        $result = mysqli_query($conn, 'SELECT * FROM event ORDER BY RAND() LIMIT 3');
        while ($row = mysqli_fetch_assoc($result)):
          ?>
          <div class="col-lg-4 mb-4">
            <a href="ticket-details.php?id_event=<?php echo $row["id_event"]; ?>" class="event-link">
              <!-- Tambahkan tautan -->
              <div class="event-item"
                style="border: 2px solid white;border-radius:20px;overflow:hidden;box-shadow: 0px 10px 15px -10px rgba(0, 0, 0, 0.5);">
                <div class="thumb">
                  <img src="assets/images/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["gambar"]; ?>" />
                </div>
                <div class="down-content">
                  <h4>
                    <?php echo $row["judul"]; ?>
                  </h4>
                  <ul>
                    <li><i class="fa fa-clock-o"></i>
                      <?php echo $row["tanggal"]; ?>
                    </li>
                    <li><i class="fa fa-map-marker"></i>
                      <?php echo $row["lokasi"]; ?>
                    </li>
                  </ul>
                </div>
              </div>
            </a>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <!-- Berita -->
  <div class="berita">
    <div class="container">
      <h2 class="title" style="color:#2a2a2a;margin-top:60px;">Berita</h2>
      <a href="berita_page.php" class="berita-page-link mb-4 text-center text-dark">
        Lihat Semua Berita <i class="fa-solid fa-arrow-right"></i>
      </a>

      <div class="row">

        <?php
        $result = mysqli_query($conn, "SELECT b.*, k.nama_kategori FROM berita b join kategori k on (b.id_kategori=k.id_kategori) ORDER BY b.tanggal DESC LIMIT 3");
        while ($row = mysqli_fetch_assoc($result)):

          if (strlen($row['isi']) > 50) {
            $str = substr($row['isi'], 0, 300) . '...';
          } else {
            $str = $row['isi'];
          }
          ?>
          <div class="col-lg-4 mb-4">
            <div class="berita-item" style="overflow:hidden;box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);">
              <div class="header-content">
                <h5>
                  <?php echo $row["nama_kategori"]; ?>
                </h5>
                <p>
                  <?php echo $row["tanggal"]; ?>
                </p>
              </div>
              <div class="thumb">
                <img src="assets/images/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["gambar"]; ?>" />
              </div>
              <div class="content">
                <h4 class="text-left mb-2">
                  <?php echo $row["judul"]; ?>
                </h4>
                <p class="isi">
                  <?php echo $str; ?>
                </p>

                <a href="berita_details.php?id_berita=<?php echo $row["id_berita"]; ?>">
                  <p class="read-more">Lanjut Membaca</p>
                </a>

              </div>
            </div>
          </div>
        <?php endwhile; ?>
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
  <script src="https://kit.fontawesome.com/578d8a95ef.js" crossorigin="anonymous"></script>
</body>

</html>