<?php
include ('koneksi.php');

$transaksi = $_GET['id'];
$deletepesanan = mysqli_query($koneksi,"DELETE FROM tbdetail where id_produk = '$transaksi'");
// var_dump($deletepesanan)
if ($deletepesanan)

	echo "<script type='text/javascript'> alert('Pesanan berhasil dihapus'); 
	window.location='pesanan.php'; </script>";
	 else

		 echo "<script type='text/javascript'> alert('Pesanan  gagal dihapus'); 
		 window.location='menu.php'; </script>";
?>