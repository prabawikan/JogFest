<?php
include 'koneksi.php';

if(isset($_GET['id_event'])) {
  $id_event = $_GET['id_event'];

  // Query database untuk mendapatkan informasi tiket berdasarkan id_event
  $query = "SELECT * FROM event WHERE id_event = $id_event";
  $result = mysqli_query($conn, $query);

  if(mysqli_num_rows($result) > 0) {
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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>ArtXibition Ticket Detail Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/tooplate-artxibition.css">
<!--


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
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="rent-venue.html" class="active">Venue</a></li>
                            <li><a href="tickets.php">Tickets</a></li>
                            <li><a href="about.html">About Us</a></li>
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
                    <img src="assets/images/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["judul"]; ?>">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4 class="mb-4" ><?php echo $row["judul"] ?></h4>
                        <ul>
                            <li><i class="fa fa-clock-o"></i><?php echo $row["tanggal"] ?></li>
                            <li><i class="fa fa-map-marker"></i><?php echo $row["lokasi"] ?></li>
                        </ul>
                        <div class="quantity-content">
                            <div class="left-content">
                                <h6>Standard Ticket</h6>
                                <p>Rp. <?php echo $row["harga"] ?></p>
                            </div>
                            <div class="right-content">
                                <div class="quantity buttons_added">
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                </div>
                            </div>
                        </div>
                        <div class="total">
                            <h4>Total: $210.00</h4>
                            <div class="main-dark-button"><a href="#">Purchase Tickets</a></div>
                        </div>
                        <div class="warn">
                            <p>*You Can Only Buy 10 Tickets For This Show</p>
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
                                        <li><a href="index.php" class="active">Home</a></li>
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="rent-venue.html">Rent Venue</a></li>
                                        <li><a href="shows-events.html">Shows & Events</a></li> 
                                        <li><a href="tickets.html">Tickets</a></li> 
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

  </body>

</html>
