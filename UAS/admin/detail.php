<?php
session_start();
include ('../lib/koneksi.php');

if(!isset($_SESSION['login'])){
    header("Location:/10519100/UAS/index.php");
}

if(!isset($_GET['no_pesanan'])){
    header("Location:/10519100/UAS/admin/admin.php");
}

$dpesananQuery = "SELECT * FROM tbpesanan
JOIN tbmeja ON tbpesanan.no_meja = tbmeja.no_meja
JOIN tbdetail ON tbdetail.no_pesanan = tbpesanan.no_pesanan
JOIN tbproduk ON tbproduk.id_produk = tbdetail.id_produk
WHERE tbpesanan.no_pesanan = '" . $_GET['no_pesanan'] ."'
AND tbpesanan.tgl_selesai_pesanan IS NULL";

$dpesananData = mysqli_query($koneksi, $dpesananQuery);

if($dpesananData->num_rows == 0){
    header("Location:/10519100/UAS/admin/admin.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/10519100/UAS/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/10519100/UAS/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/10519100/UAS/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/10519100/UAS/admin/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/10519100/UAS/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/10519100/UAS/index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>J</b>K</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Jajan</b>Kuy</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/10519100/UAS/admin/dist/img/user2-160x160.jpg" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">Admin</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/10519100/UAS/admin/dist/img/user2-160x160.jpg" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        Admin
                                        <small>Member since Nov. 2022</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form action="" method="POST">
                                            <button class="btn btn-default btn-flat" name="logout">Sign out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/10519100/UAS/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Admin</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Data</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="admin.php"><i class="fa fa-circle-o"></i>Data Pesanan</a>
                            </li>
                            <li><a href="menu-admin.php"><i class="fa fa-circle-o"></i> Data Menu</a></li>
                            <li><a href="meja-admin.php"><i class="fa fa-circle-o"></i> Data Meja</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Pesanan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>No Pesanan</th>
                                <th>No Meja</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                            </tr>
                            <tbody>
                                <?php 
                $total = 0;
                while($dpesanan = mysqli_fetch_assoc($dpesananData)){ 
            ?>
                                <tr>
                                    <div class="btn-group">
                                        <td><?= $dpesanan['no_pesanan'] ?></td>
                                        <td><?= $dpesanan['no_meja'] ?></td>
                                        <td><?= $dpesanan['nama_produk'] ?></td>
                                        <td>Rp. <?= number_format($dpesanan['harga'], 0, '', '.') ?></td>
                                        <td><?= $dpesanan['qty'] ?></td>
                                        <td>Rp. <?= number_format($dpesanan['subtotal'], 0, '', '.') ?></td>
                                    </div>
                                </tr>
                                <?php
                $total = $total + $dpesanan['subtotal'];
                }
            ?>
                                <tr>
                                    <td colspan="5">TOTAL:</td>
                                    <td>Rp. <?= number_format($total, 0, '', '.') ?></td>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

        </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2022 <a href="https://adminlte.io">JajanKuy</a>.</strong> All rights
        reserved.
    </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="/10519100/UAS/admin/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/10519100/UAS/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Slimscroll -->
    <script src="/10519100/UAS/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/10519100/UAS/admin/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/10519100/UAS/admin/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/10519100/UAS/admin/dist/js/demo.js"></script>
</body>

</html>