<?php
include 'koneksi.php';

session_start();

if (isset($_GET['id_event'])) {
    $id_event = $_GET['id_event'];

    // Query database untuk mendapatkan informasi tiket berdasarkan id_event
    $query = "SELECT * FROM event WHERE id_event = $id_event";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Tiket tidak ditemukan.";
    }
} else {
    echo "Parameter id_event tidak ditemukan.";
}
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

    <title>ArtXibition Ticket Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css">
    <!--

-->
    <style>
        .isi {
            font-size: 16px;
            font-family: "Poppins";
            font-weight: 400;
        }

        .image {
            width: 100%;
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
    <div class="page-heading-shows-events">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Information about the events</h2>
                    <span>Check out upcoming and past shows & events and grab your ticket right now.</span>
                </div>
            </div>
        </div>
    </div>

    <div class="ticket-details-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-image">
                        <img class="image" src="assets/images/<?php echo $row["gambar"]; ?>"
                            alt="<?php echo $row["judul"]; ?>">
                        <p class="isi mt-3">
                            <?php echo $row["isi"]; ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4 class="mb-4">
                            <?php echo $row["judul"] ?>
                        </h4>
                        <ul>
                            <li><i class="fa fa-clock-o"></i>
                                <?php echo $row["tanggal"] ?>
                            </li>
                            <li><i class="fa fa-map-marker"></i>
                                <?php echo $row["lokasi"] ?>
                            </li>
                        </ul>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Harga Tiket</h6>
                                <p>Rp.
                                    <?php echo $row["harga"] ?>
                                </p>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1"
                                        max="" name="quantity" value="1" title="Qty" class="input-text qty text"
                                        size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<div class="main-dark-button"><a href="#t" data-login="1">Beli Tiket</a></div>';
                        } else {
                            echo '<div class="main-dark-button"><a href="login.php">Login untuk membeli tiket</a></div>';
                        }
                        ?>
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
    <script src="assets/js/quantity.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('[data-login="1"]').on('click', function (e) {
                e.preventDefault();

                // Periksa status login pengguna
                <?php if (isset($_SESSION['user_id'])): ?>
                    // Jika pengguna sudah login, tampilkan konfirmasi
                    var confirmBuy = confirm('Apakah Anda yakin ingin membeli tiket?');

                    if (confirmBuy) {
                        // Jika pengguna yakin, munculkan alert pembelian berhasil
                        alert('Anda berhasil membeli tiket.');
                    }
                <?php else: ?>
                    // Jika pengguna belum login, munculkan alert untuk login
                    alert('Anda harus login terlebih dahulu.');
                    // Redirect ke halaman login
                    window.location.href = 'login.php';
                <?php endif; ?>
            });
        });
    </script>


</body>

</html>