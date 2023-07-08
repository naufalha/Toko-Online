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

<?php
error_reporting(E_ALL & ~E_WARNING);

session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$kategori = $_SESSION['kategori'];

?>
<br>

<div class="container">
    <div class="row">
        <?php
       error_reporting(E_ALL & ~E_WARNING);

        require_once("koneksi.php");

        $sql = "SELECT * FROM barang WHERE login_id != '".$_SESSION['id']."'";
        $result = mysqli_query($koneksi, $sql);

        if (isset($_POST['submit'])) {
            $insertkeranjang = "INSERT INTO keranjang (id, idbarang, jumlah) VALUES ('".$_POST['iduser']."', '".$_POST['idbarang']."', '".$_POST['jumlah']."')";
            $inserted = mysqli_query($koneksi, $insertkeranjang);
            
            if ($inserted) {
                echo "<script>alert('Berhasil ditambahkan ke keranjang')</script>";
            } else {
                echo "Error: " . $insertkeranjang . "<br>" . mysqli_error($koneksi);
            }
        }

        if ($result) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col-lg-3 col-md-4 col-sm-6">';
                echo '<div class="card mb-4">';
                echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nama"] . '</h5>';
                echo '<p class="card-text">Harga: ' . $row["harga"] . '</p>';
                echo '<a href="barang.php?idbarang=' . $row['idbarang'] . '" class="btn btn-primary">Deskripsi</a>';
                echo '<div class="container mt-3">';
                echo '<form action="hasillogin.php" method="post">';
                echo '<input type="hidden" name="idbarang" value="'.$row['idbarang'].'">';
                echo '<input type="hidden" name="iduser" value="'.$_SESSION['id'].'">';
                echo '<input class="form-control" type="number" max="99" name="jumlah" value="1">';
                echo '<input type="submit" name="submit" value="Keranjang" class="btn btn-success mt-2">';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        mysqli_close($koneksi);
        ?>
    </div>
</div>

<footer class="footer bg-primary text-white">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>&copy; 2023 Toko-Online. Hak Cipta Dilindungi</p>
        <img src="logo.png" alt="Toko-Online Logo" class="footer-logo">
      </div>
    </div>
  </div>
</footer>

</body>
</html>
