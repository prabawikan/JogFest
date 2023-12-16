<?php
include "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <title>JOGFest - Event Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css">
    <!--

Tooplate 2125 ArtXibition

https://www.tooplate.com/view/2125-artxibition

-->
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
                        <a class='menu-trigger'>
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
    <div class="page-heading-rent-venue">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Event Details</h2>
                    <span>Check out our latest Shows & Events and be part of us.</span>
                </div>
            </div>
        </div>
    </div>

    <?php


    // Ambil nilai parameter kategori dari URL
    $kategori = isset($_GET['kategori']) ? urldecode($_GET['kategori']) : '';

    ?>

    <div class="shows-events-schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>
                            <?php echo $kategori; ?>
                        </h2>
                    </div>
                </div>
                <div class="col-lg-12">
                    <ul>
                        <?php

                        // Ambil data event berdasarkan kategori dari database
                        $query = mysqli_query($conn, "SELECT * FROM event WHERE id_kategori IN (SELECT id_kategori FROM kategori WHERE nama_kategori = '$kategori')");

                        while ($event = mysqli_fetch_assoc($query)) {
                            // Tampilkan informasi event sesuai dengan struktur yang diinginkan
                            ?>
                            <li>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="title">
                                            <h4>
                                                <?php echo $event['judul'] ?>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="time"><span><i class="fa fa-clock-o"></i>
                                                <?php echo $event['tanggal'] ?><br>18:00 to
                                                23:00
                                            </span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="place"><span><i class="fa fa-map-marker"></i>
                                                <?php echo $event['lokasi'] ?>
                                            </span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="main-dark-button">
                                            <a href="ticket-details.php?id_event=<?php echo $event["id_event"]; ?>">Beli
                                                Tiket</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                    </ul>
                </div>
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
                                <div class="logo"><span>JOG<em>Fest</em></span></div>
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

</body>

</html>