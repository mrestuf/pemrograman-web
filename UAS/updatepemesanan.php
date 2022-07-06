<?php
//koneksi database
include ('koneksi.php');
if(isset($_POST['submit']))
{
//mengambil data yang dikirim dari form
    $id=$_POST['id'];
    $namaproduk=$_POST['nama_produk'];
	$harga=$_POST['harga'];
	$qty=$_POST['qty'];
    $subtotal=$qty*$harga;
    $no_pesanan=$_POST['no_pesanan'];

//update data pemesanan
$updatepemesanan=mysqli_query($koneksi,"UPDATE tbdetail SET qty='$qty', subtotal='$subtotal' WHERE id_produk='$id' AND no_pesanan='$no_pesanan'");

if ($updatepemesanan)
echo "<script type='text/javascript'> alert('Data pesanan telah diubah'); window.location='pesanan.php';</script>";
 else
 echo "<script type='text/javascript'> alert('Data pesanan gagal diubah'); window.location='pesanan.php';</script>";
}
?>