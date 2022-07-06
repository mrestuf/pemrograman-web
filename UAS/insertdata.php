<html>
<?php
//koneksi database
include ('koneksi.php');
if(isset($_POST['submit']))
{
//mengambil data yang dikirim dari form
    $nomeja=$_POST['no_meja'];

    $query="SELECT no_pesanan FROM tbpesanan";
    $cekpesanan=mysqli_query($koneksi,$query);

    if(!$cekpesanan){
        printf("Error: %s\n", mysqli_error($koneksi));
        exit();
    }   
    if (mysqli_num_rows($cekpesanan)!=0){
        //query ambil data terakhir
        $querymax="SELECT no_pesanan FROM tbpesanan ORDER BY no_pesanan DESC LIMIT 1";
        $sqlmax=mysqli_query($koneksi,$querymax);

        while ($idmax=mysqli_fetch_assoc($sqlmax)){
            $kode=$idmax['no_pesanan'];
            $nomor=(int) substr($kode, 3, 3); //ambil dari urutan ke 1 sebanyak 2
            $nomor=$nomor+1;
            $nopesanan="PES".sprintf("%03s",$nomor);
        }

    } else {
        $nopesanan="PES001";
    }
//membuat id pesanan
// $query = mysqli_query($koneksi, "SELECT max(no_pesanan) as nopesanan FROM tbpesanan");
// $data = mysqli_fetch_array($query);
// $nopesanan = $data['nopesanan'];
// $urutan = (int) substr($nopesanan, 3, 3);
// $urutan++;
// $huruf = "PES";
// $nopesanan = $huruf . sprintf("%03s", $urutan);
$date = date("Y-m-d");

// $data=mysqli_query($koneksi,'SELECT * FROM tbpesanan where no_pesanan="'.$nopesanan.'"');
// $dp=mysqli_num_rows($data);
//simpan data 
$insertdata="INSERT INTO tbpesanan(no_pesanan, no_meja, tgl_pesanan) VALUES('$nopesanan','$nomeja','$date')";
$sql=mysqli_query($koneksi,$insertdata); 

        if ($sql){
            echo "<script type='text/javascript'> alert('Silahkan pilih menu'); window.location='menu.php';</script>";
        } else {
            echo "<script type='text/javascript'>; window.location='meja.php';</script>";
        }	
    } 
?>

</html>