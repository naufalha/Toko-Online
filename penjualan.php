<!DOCTYPE html>
<html>
<head>
<title>Toko-Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    .footer-logo {
    width: 100px; /* Adjust the width as needed */
    height: 50px; /* Adjust the height as needed */
    margin-left: auto; /* Move the logo to the right */
  }
  
</style>
</head>
<body>
<script src="js/bootstrap.min.js"></script>
<header>
    <nav class="container-fluid">
        <div class="logo">
            <img src="logo.png" alt="Tokopedia Logo">
        </div>
    </nav>
    <a class="lomgin2" href="jual.php">Jual Barang</a>
    <a class="lomgin2" href="user_barang.php">Barang Saya</a>
    <a class="lomgin2" href="penjualan.php">Barang Terjual</a>
    <a class="lomgin2" href="keranjang.php">Keranjang</a>
    <a class="lomgin2" href="logout.php">Logout</a>
</header>

<body >
    
<div class="container center">
<?php
session_start();

require_once("koneksi.php");
$sql = "SELECT transaksi.id_pembeli as pembeli,transaksi.id_keranjang as id_keranjang,transaksi.id_penjual as id_penjual,transaksi.bukti_bayar as bukti_bayar from transaksi where id_penjual = ".$_SESSION['id']."";

$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
        
        $data[] = $row;
        $sqlKeranjang="SELECT barang.nama as nama_barang,barang.harga as harga_barang,keranjang.jumlah as jumlah_barang from keranjang inner join barang on keranjang.idbarang = barang.idbarang where keranjang.id_keranjang = ".$row["id_keranjang"]."";
        $resultKeranjang = mysqli_query($koneksi, $sqlKeranjang);
        $rowKeranjang = mysqli_fetch_assoc($resultKeranjang);
        $sqlPembeli="SELECT * FROM login where id = ".$row["pembeli"]."";
        $resultPembeli = mysqli_query($koneksi, $sqlPembeli);
        $rowPembeli = mysqli_fetch_assoc($resultPembeli);

        echo "<div class='row mt-4 mb-4 --bs-info lomgin2' <div style=''>";
        echo "<div class='col-sm-3 mt-4 mb-4'>";
        echo "<img  class='img-fluid rounded card-img-top'  src=".$row["bukti_bayar"].  ">";
        echo "</div>";
        echo "<div class='col-sm-3'>";
            echo "<div class='row mt-4'>";
                echo "<div class='col-sm-100'>";
        echo "<p> nama barang : " .$rowKeranjang["nama_barang"]."<p>";
                echo "</div>";
                echo "<div class='col-sm-100'>";
        echo "<p> harga: " .$rowKeranjang["harga_barang"]. " jumlah: ".$rowKeranjang["jumlah_barang"]."<p>";
                echo "</div>";
                echo "<div class='col-sm-100'>";
        echo "<p> Total Pembayaran: " .$rowKeranjang["harga_barang"]*$rowKeranjang["jumlah_barang"]."<p>";
                echo "</div>";
            echo "</div>";
        echo "<div class='row'>";
            echo "<div class='col--00'>";
            echo "<p> Alamat Pembeli </p>";
            echo "</div>";

        echo "<div class='row'>";
            echo "<div class='col-100'>";
        echo "<p> Nama: " .$rowPembeli["username"].", ".$rowPembeli["alamat"].", ".$rowPembeli["hp"]."<p>";
            echo "</div>";
            
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo "</div>";
    }
   
} else {
    echo "0 results";
}




?>
</div>
</body>