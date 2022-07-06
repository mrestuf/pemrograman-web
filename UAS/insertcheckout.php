<?php
$total = 0;

include "koneksi.php";
$query1="SELECT no_pesanan FROM tbpesanan ORDER BY no_pesanan DESC LIMIT 1";
        $cek=mysqli_query($koneksi,$query1);
        while ($data=mysqli_fetch_assoc($cek)){
        $nopesanan=$data['no_pesanan'];
}
$query = mysqli_query($koneksi, 'SELECT * FROM tbdetail JOIN tbproduk on tbdetail.id_produk=tbproduk.id_produk where tbdetail.no_pesanan="'.$nopesanan.'"');
while ($data = mysqli_fetch_array($query)) {
    $idproduk = $data['id_produk'];
    $data['subtotal'] = $data['harga']*$data['qty'];
    $total += $data['subtotal'];
}

$insertpesanan="INSERT INTO tbpesanan (total) VALUES('$total')";
    $sql=mysqli_query($koneksi,$insertpesanan);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Pemesanan Berhasil'); window.location='pemesanan_berhasil.php';</script>";
        } else {
            
            echo "<script type='text/javascript'> alert('Pemesanan Gagal'); window.location='menu.php';</script>";
        }	
        $update = mysqli_query($koneksi,"UPDATE tbpesanan set total='$total' where no_pesanan = '$nopesanan'");
        $delete = mysqli_query($koneksi,"DELETE FROM tbpesanan where tgl_pesanan='0000-00-00'");

?>