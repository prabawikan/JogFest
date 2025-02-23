<?php

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

    <title>JOGFest</title>


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
                            <li><a href="tickets.php">Tickets</a></li>
                            <li><a href="about.html" class="active">About Us</a></li>
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
    <div class="page-heading-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>JOGFest</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="about-upcoming-shows">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h2>About The Website</h2>
                    <p>Kami adalah Quadrasync, sebuah kelompok yang membuat website tentang event atau acara-acara yang
                        ada di Yogyakarta.</p>
                    <h4>Visi dan Misi</h4>
                    <p>
                        Visi kami adalah membuat Yogyakarta terkenal akan events yang ada terutama pada seni dan
                        budayanya. Misi kami adalah menyelesaikan website agar dapat berjalan dengan baik sesuai dengan
                        ekspetasi kami.
                    </p>
                    <h4>Directions & Car Parking</h4>
                    <p>Jika Anda memiliki pertanyaan lebih lanjut atau ingin bermitra dengan kami, jangan ragu untuk
                        menghubungi tim kami melalui nomor 01234567.</p>

                    <p>Terima kasih atas dukungan Anda. Kami berharap dapat melayani Anda dengan baik dan menjadi mitra
                        terpercaya Anda.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="also-like">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>OUR TEAM MEMBERS</h2>
                </div>
                <div class="col-lg-4">
                    <div class="like-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="assets/images/members.jpg" alt=""></a>
                        </div>
                        <div class="down-content">
                            <span>Prabawikan Himawan Azhar</span> </br>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="like-item">
                        <div class="thumb"
                            <a href="event-details.html"><img src="assets/images/members.jpg" alt=""></a>
                        </div>
                        <div class="down-content">
                            <span>Muhammad Aufa Dhaifullah</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="like-item">
                        <div class="thumb">
                            <a href="event-details.html"><img src="assets/images/members.jpg" alt=""></a>
                        </div>
                        <div class="down-content">
                            <span>Alifah Kusuma Ramadhini</span>
                        </div>
                    </div>
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
    <script src="https://kit.fontawesome.com/578d8a95ef.js" crossorigin="anonymous"></script>

</body>

</html>