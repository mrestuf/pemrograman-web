<?php 
  include('../lib/koneksi.php');
if(isset($_POST['submit']))
{
$id_produk      = $_POST['id_produk'];
$nama_produk = $_POST['nama_produk'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];

$dir_upload = "image/";
$gambar_name=$_FILES['gambar_produk']['name'];
$gambar_tmp=$_FILES['gambar_produk']['tmp_name'];

//mengambil data gambar_produk dari table tbproduk
$get_gambar = "SELECT gambar_produk from tbproduk where id_produk ='$id_produk'";
$data_gambar = mysqli_query($koneksi, $get_gambar);

//Mengubah data yang diambil menjadi array
$gambar_lama = mysqli_fetch_array($data_gambar);

//menghapus Gambar Lama dalam folder image
unlink("image/".$gambar_lama['gambar_produk']);

if(is_uploaded_file($_FILES['gambar_produk']['tmp_name'])){ //mengupload file
    move_uploaded_file($_FILES['gambar_produk']['tmp_name'], $dir_upload.$gambar_name); //dipindahkan (move) ke direktori yang diinginkan
}
  //query update data ke dalam database berdasarkan ID
  $query = "UPDATE tbproduk SET id_produk = '$id_produk', nama_produk = '$nama_produk', gambar_produk = '$gambar_name', stok = $stok, harga = $harga WHERE id_produk = '$id_produk'";
  
  //kondisi pengecekan apakah data berhasil diupdate atau tidak
  if($koneksi->query($query)) {
      //redirect ke halaman index.php 
      header("Location:/10519100/UAS/admin/menu-admin.php");
  } else {
      //pesan error gagal update data
      echo "Data Gagal Diupdate!";
  }
}
  ?>