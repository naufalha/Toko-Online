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
session_start();
$username = $_SESSION['username'];
$id = $_SESSION['id'];
$kategori = $_SESSION['kategori'];
echo '<script>alert("Anda Berhasil Login Sebagai '.$username.' Dan Anda Terdaftar Sebagai '.$id.' '.$kategori.'");</script>';
?>
<br>

<div class="container">
    <div class="row">
        <?php
        require_once("koneksi.php");

        $sql = "SELECT * FROM barang WHERE login_id != '".$_SESSION['id']."'";
        $result = mysqli_query($koneksi, $sql);

        if (isset($_POST['submit'])) {
            $insertkeranjang = "INSERT INTO keranjang (id, idbarang, jumlah) VALUES ('".$_POST['iduser']."', '".$_POST['idbarang']."', '".$_POST['jumlah']."')";
            $result = mysqli_query($koneksi, $insertkeranjang);
            echo $insertkeranjang;
            if ($result) {
                echo "New record created successfully";
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
                echo '<a href="barang.php?idbarang=' . $row['idbarang'] . '" class="btn btn-primary">Beli</a>';
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

<footer class="footer bg-dark text-light">
    <div class="container">
    <p>Hak Cipta &copy; 2023 Namfra</p>
      <ul class="footer-links">
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Syarat dan Ketentuan</a></li>
        <li><a href="#">Kebijakan Privasi</a></li>
      </ul>
    </div>
  </footer>

</body>
</html>
