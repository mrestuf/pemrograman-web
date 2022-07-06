<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title> JajanKuy - Menu </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <div class="hero_bg_box">
      <img src="bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <span>
              JajanKuy
            </span>
          </a>
          <div class="" id="">
            <div class="custom_menu-btn">
              <button onclick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                <a href="index.php">Home</a>
                <a href="menu.php">Menu</a>
                <a href="pesanan.php">Keranjang</a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- veg section -->

  <section class="veg_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>

      </div>
      <div class="row">
      <?php
        include "koneksi.php";
        $query1 = mysqli_query($koneksi, 'SELECT * FROM tbproduk');
        while ($data1 = mysqli_fetch_assoc($query1)){
            $namaproduk=$data1['nama_produk'];
            $harga=$data1['harga'];
            $id = $data1['id_produk'];
            ?>
        <div class="col-md-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="/10519100/UAS/admin/image/<?= $data1['gambar_produk'] ?>">
            </div>
            <div class="detail-box">
              <p class="font-weight-bold">
              <?php echo $namaproduk?>
              </p>
              <div class="price_box">
                <h6 class="price_heading">
                <?php echo "Rp. ",number_format($harga,0,",",".")?>
                </h6>
              </div>
              <div class="mt-3">
              <button class ="btn btn-outline-secondary"><a href="pesan.php?id=<?php echo $id ?>">Tambah Pesanan</a> </button>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- end veg section -->

  <!-- footer section -->
  <section class="container-fluid footer_section ">
    
  </section>
  <!-- end  footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>

</html>