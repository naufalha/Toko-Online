<!DOCTYPE html>
<html>
<head>
<title>Toko-Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">





</head>
<body>
<script src="js/bootstrap.min.js"></script>
    <header >
        <nav class="container-fluid">
          <div class="logo">
            <img src="logo.png" alt="Tokopedia Logo">
          </div>
        </nav>
        <a class="lomgin2" href="logout.php">Logout</a> <a class="lomgin2" href="register.php">Register</a>
      </header>




<?php 
    session_start();
    echo "Anda Berhasil Login Sebagai ".$_SESSION['username']." Dan Anda Terdaftar Sebagai ".$_SESSION['id'],$_SESSION['kategori'];
?>
<br>
<h3><a href="jual.php">jual barang</a> <a href="user_barang.php">barang saya</a></h3>


<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}

$sql = "SELECT * FROM barang";
$result = mysqli_query($koneksi, $sql);
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col">';
        echo '<div class="card" style="width: 18rem;">';
        echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["nama"] . '</h5>';
        echo '<p class="card-text">Harga: ' . $row["harga"] . '</p>';
        echo '<a href="barang.php?idbarang=' . $row['idbarang'] . '" class="btn btn-primary">Beli</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
mysqli_close($koneksi);
?>

Silahkan Logout dengan klik link <a href="logout.php">Disini</a>
