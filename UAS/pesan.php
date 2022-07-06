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

  <title> JajanKuy - Pesan </title>

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
          Pesanan
        </h2>

      </div>
      <div class="row">
    <table>
      <form method="POST" action="insertpemesanan.php">
        <?php
        include "koneksi.php";
        $id=$_GET['id'];
        // $nopesanan=$_GET['nopesanan'];
        // $nomeja=$_GET['nomeja'];
        // $date=$_GET['date'];
        $datapesan = mysqli_query($koneksi, 'SELECT * FROM tbproduk where id_produk="'.$id.'"');
        while ($dp = mysqli_fetch_array($datapesan)){
        ?>
            <img src="/10519100/UAS/admin/image/<?= $dp['gambar_produk'] ?>" style="width:1200px;height:800px">
            <div class="col mt-4"><h2><?php echo $dp['nama_produk'];?></h2> </div>
            <div class="col mt-4"><h3><?php echo "Rp. ",number_format($dp['harga'],0,",",".");?></h3> </div>
            <div class="col mt-4"><input type="number" name=qty min="1" max="<?php echo $dp['stok'];?>">
            <input type="hidden" name="id" value=<?php echo $id;?>>
            <input type="hidden" name="nama_produk" value="<?php echo $dp['nama_produk']?>">
            <input type="hidden" name="harga" value=<?php echo $dp['harga']?>>
            <!-- <input type="text" name="nopesanan" value=$nopesanan>
            <input type="hidden" name="nomeja" value=$nomeja>
            <input type="hidden" name="date" value=$date> -->
					<!-- <a href="pesan.php?id=<?php echo $id;?>"> PESAN </a>  -->
                <input type="submit" name="submit" value="PESAN"> </div>
	<?php } ?>
    </table> 
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