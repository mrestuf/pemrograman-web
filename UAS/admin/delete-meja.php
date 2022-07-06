<?php 
  include('../lib/koneksi.php');

  $no_meja = $_GET['no_meja'];

  $query = "DELETE FROM tbmeja WHERE no_meja = '$no_meja'";

  if($koneksi->query($query)){
    header("Location:/10519100/UAS/admin/meja-admin.php");
  }
  else{
      echo "Data Gagal Dihapus";
  }