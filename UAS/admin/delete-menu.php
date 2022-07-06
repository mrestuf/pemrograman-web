<?php 
  include('../lib/koneksi.php');

  $id_produk = $_GET['id_produk'];

  $get_gambar = "SELECT gambar_produk from tbproduk where id_produk ='$id_produk'";
  $data_gambar = mysqli_query($koneksi, $get_gambar);

//Mengubah data yang diambil menjadi array
  $gambar_lama = mysqli_fetch_array($data_gambar);

//menghapus Gambar Lama dalam folder image
  unlink("image/".$gambar_lama['gambar_produk']);

  $query = "DELETE FROM tbproduk where id_produk = '$id_produk'";

  if($koneksi->query($query)){
    header("Location:/10519100/UAS/admin/menu-admin.php");
  }
  else{
      echo "Data Gagal Dihapus";
  }