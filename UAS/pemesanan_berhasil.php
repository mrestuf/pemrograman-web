<?php 
$n =1;
        include "koneksi.php";
        $query1="SELECT no_pesanan FROM tbpesanan ORDER BY no_pesanan DESC LIMIT 1";
        $cek=mysqli_query($koneksi,$query1);
        while ($data=mysqli_fetch_assoc($cek)){
        $nopesanan=$data['no_pesanan'];
        }
        $query = mysqli_query($koneksi, 'SELECT * FROM tbdetail JOIN tbproduk on tbdetail.id_produk=tbproduk.id_produk where tbdetail.no_pesanan="'.$nopesanan.'"');
        ?>

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

  <title> JajanKuy - Berhasil </title>

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
          <a class="navbar-brand" href="index.html">
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
          Pesanan No <?= $nopesanan ?> Berhasil
        </h2>
      </div>
      <table class="table table-bordered table-hover">
      <tr>
        <td>No.</td>
        <td>NAMA PRODUK</td>
        <td>HARGA</td>
        <td>QTY</td>
        <td>SUBTOTAL</td>
    </tr>
    <?php
        
        while ($data = mysqli_fetch_array($query)) {
        ?>
    <tr>
                <?php 
                $idproduk = $data['id_produk'];
                $data['subtotal'] = $data['harga']*$data['qty']
                ?>
                <td><?php echo $n++;?></td>
                <td><?php echo $data['nama_produk'] ?></td>
                <td><?php echo "Rp. ",number_format($data['harga'],0,",",".") ?></td>
                <td><?php echo $data['qty'] ?></td>
                <td><?php echo "Rp. ",number_format($data['subtotal'],0,",",".") ?></td>

                <?php
                    if($data['subtotal'] != 0){
                @$total += $data['subtotal'];
                }?>
            </tr>
            
            <!-- <tr>
            <?php $data['total'] = $data['subtotal']?>
                <td>TOTAL</td>
                <td><?php $data['total']?></td>
            </tr> -->
        <?php } ?>
        <tr>
            <td>TOTAL</td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php 
            if(!empty($total)){
                echo "Rp. ",number_format($total,0,",",".");
            }else{
                echo 0;
            }
            ?></td>
        </tr>
        </table>
      </div>
  </section>

  <!-- end veg section -->

  <!-- footer section -->
  <footer class="fixed-bottom">
  <section class="container-fluid footer_section">
       
  </section>
  </footer>
  <!-- end  footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->
</body>

</html>