<?php 

// session_start();

// if(!isset($_SESSION["login"])) {
//   header("Location: login.php");;
//   exit;
// }

include 'koneksi.php'; 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Tooplate" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet" />

    <title>JOGFest</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" />

    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css" />
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
              <a href="index.html" class="logo">JOG<em></em></a>
              <!-- ***** Logo End ***** -->
              <!-- ***** Menu Start ***** -->
              <ul class="nav">
                <li><a href="index.html" class="active">Home</a></li>
                <li><a href="rent-venue.html">Venue</a></li>  
                <li><a href="tickets.php">Tickets</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a style="background-color: #2a2a2a; padding: 0 20px; color:white; border-radius: 20px" class="btn-login" href="logout.php">Login</a></li>
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
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-01.jpg" alt=""></a>
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-02.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-03.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-04.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-01.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-02.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-03.jpg" alt=""></a> 
                      </div>
                      <div class="item">
                          <a href="event-details.html"><img src="assets/images/show-events-04.jpg" alt=""></a> 
                      </div>
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
                Aplikasi yang menyajikan jadwal acara di Yogyakarta dengan lima kategori utama, yaitu musik, seni, budaya, olahraga, dan edukasi, memberikan pengguna kemudahan untuk menemukan berbagai kegiatan menarik yang sesuai dengan minat mereka. Dalam kategori musik, aplikasi ini menghadirkan informasi konser, festival, dan pertunjukan musik dari berbagai genre, sehingga pengguna dapat merencanakan partisipasi mereka dalam event musik yang sesuai dengan selera mereka.              </p>
              <br />
              <p>
                Selain itu, aplikasi ini juga memuat acara seni yang melibatkan pameran seni rupa, pertunjukan teater, dan event seni pertunjukan lainnya. Dalam kategori budaya, pengguna dapat menemukan acara yang memperkenalkan kekayaan budaya lokal, seperti festival tradisional, upacara adat, dan pameran budaya. Untuk penggemar olahraga, aplikasi ini menyajikan informasi mengenai pertandingan, turnamen, dan kegiatan olahraga lainnya yang berlangsung di Yogyakarta. Terakhir, kategori edukasi mencakup seminar, lokakarya, dan kegiatan pembelajaran lainnya yang memberikan wawasan dan pengetahuan baru kepada pengguna. Dengan aplikasi ini, warga Yogyakarta dan pengunjung dapat dengan mudah menjelajahi dan mengikuti beragam acara yang berlangsung di kota ini, mendukung budaya lokal dan meningkatkan kualitas hidup komunitas.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- *** Coming Events ***-->
    <div class="coming-events">
    <div class="container">
        <div class="row">
            <?php
            $result = mysqli_query($conn, 'SELECT * FROM event');
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <div class="col-lg-4 mb-4">
                    <div class="event-item">
                        <div class="thumb">
                            <a href="rent-venue.html#tabs-2"><img src="assets/images/<?php echo $row["gambar"]; ?>" alt="" /></a>
                        </div>
                        <div class="down-content">
                            <a href="rent-venue.html#tabs-2"><h4><?php echo $row["judul"]; ?></h4></a>
                            <ul>
                                <li><i class="fa fa-clock-o"></i><?php echo $row["tanggal"]; ?></li>
                                <li><i class="fa fa-map-marker"></i> <?php echo $row["lokasi"]; ?></li>
                            </ul>
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
                      <li><a href="index.html" class="active">Home</a></li>
                      <li><a href="about.html">About Us</a></li>
                      <li><a href="rent-venue.html">Venue</a></li>
                      <li><a href="shows-events.html">Shows & Events</a></li>
                      <li><a href="tickets.php">Tickets</a></li>
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
