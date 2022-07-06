<?php
session_start();
include '../lib/koneksi.php';
//get data dari form
if(isset($_POST['submit']))
{
$id_produk      = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$dir_upload = "image/";
$gambar_name=$_FILES['gambar_produk']['name'];
$gambar_tmp=$_FILES['gambar_produk']['tmp_name'];

if(is_uploaded_file($_FILES['gambar_produk']['tmp_name'])){ //mengupload file
	
	move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $dir_upload.$gambar_name); //dipindahkan (move) ke direktori yang diinginkan
		
	}

//query insert data ke dalam database
$query = "INSERT INTO tbproduk (id_produk, nama_produk, gambar_produk, stok, harga) VALUES ('$id_produk', '$nama_produk', '$gambar_name', $stok, $harga)";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($koneksi->query($query)) {

    //redirect ke halaman index.php 
    echo "<script type='text/javascript'>alert('Data Menu Berhasil Disimpan');location='/10519100/UAS/admin/menu-admin.php';</script>";

} else {

    //pesan error gagal insert data
    echo "<script type='text/javascript'>alert('Data Menu Gagal Disimpan');location='/10519100/UAS/admin/input-menu.php';</script>";


}
}

?>