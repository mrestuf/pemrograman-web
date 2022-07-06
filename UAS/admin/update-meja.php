<?php 
  include('../lib/template.php');
  include('../lib/koneksi.php');
  
  $no_meja        = $_POST['no_meja'];
  $kapasitas_meja = $_POST['kapasitas_meja'];

  //query update data ke dalam database berdasarkan ID
  $query = "UPDATE tbmeja SET no_meja = '$no_meja', kapasitas_meja = $kapasitas_meja WHERE no_meja = '$no_meja'";
  
  //kondisi pengecekan apakah data berhasil diupdate atau tidak
  if($koneksi->query($query)) {
      //redirect ke halaman index.php 
      header("Location:/10519100/UAS/admin/meja-admin.php");
  } else {
      //pesan error gagal update data
      echo "Data Gagal Diupate!";
  }
  ?>