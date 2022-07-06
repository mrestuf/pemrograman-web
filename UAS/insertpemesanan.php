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

    $query1="SELECT no_pesanan FROM tbpesanan ORDER BY no_pesanan DESC LIMIT 1";
    $cek=mysqli_query($koneksi,$query1);
    while ($data=mysqli_fetch_assoc($cek)){
        $nopesanan=$data['no_pesanan'];
    }
    //membuat id detail    
    $query="SELECT id_detail FROM tbdetail";
    $cekid=mysqli_query($koneksi,$query);

    if(!$cekid){
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }   
    if (mysqli_num_rows($cekid)!=0){
        //query ambil data terakhir
        $querymax="SELECT id_detail FROM tbdetail ORDER BY id_detail DESC LIMIT 1";
        $sqlmax=mysqli_query($koneksi,$querymax);

        while ($idmax=mysqli_fetch_assoc($sqlmax)){
            $iddtl=$idmax['id_detail'];
            $nomor=(int) substr($iddtl, 3, 3); //ambil dari urutan ke 1 sebanyak 2
            $nomor=$nomor+1;
            $iddetail="DTL".sprintf("%03s",$nomor);
        }

    } else {
        $iddetail="DTL001";
    }

// $query = mysqli_query($koneksi, "SELECT max(id_detail) as kodedetail FROM tbdetail");
// $data = mysqli_fetch_array($query);
// $kodedetail = $data['kodedetail'];
// $urutan = (int) substr($kodedetail, 3, 3);
// $urutan++;
// $huruf = "DTL";
// $kodedetail = $huruf . sprintf("%03s", $urutan);
//simpan data pemesanan
    $insertpesanan="INSERT INTO tbdetail(id_detail, id_produk,no_pesanan, qty, subtotal) VALUES('$iddetail','$id','$nopesanan','$qty','$subtotal')";
    $sql=mysqli_query($koneksi,$insertpesanan);    
        if ($sql){
            echo "<script type='text/javascript'> alert('Data pesanan berhasil ditambahkan'); window.location='menu.php';</script>";
        } else {
            
            echo "<script type='text/javascript'> alert('Data pesanan gagal ditambahkan'); window.location='menu.php';</script>";
        }	
}
?>