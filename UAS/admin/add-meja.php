<?php
session_start();
include '../lib/koneksi.php';
//get data dari form
$no_meja      = $_POST['no_meja'];
$kapasitas_meja = $_POST['kapasitas_meja'];

//query insert data ke dalam database
$query = "INSERT INTO tbmeja (no_meja, kapasitas_meja) VALUES ('$no_meja', $kapasitas_meja)";

//kondisi pengecekan apakah data berhasil dimasukkan atau tidak
if($koneksi->query($query)) {

    //redirect ke halaman index.php 
    echo "<script type='text/javascript'>alert('Data Meja Berhasil Disimpan');location='/10519100/UAS/admin/meja-admin.php';</script>";

} else {

    //pesan error gagal insert data
    echo "<script type='text/javascript'>alert('Data Meja Gagal Disimpan');location='/10519100/UAS/admin/input-meja.php';</script>";
}

?>