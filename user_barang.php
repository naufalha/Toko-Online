<html>
<head>
<title>Toko-Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
    
.card {
    width: 300px;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f7f7f7;
}

.card img {
    width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.card h3 {
    margin: 0;
    color: black;
}

.card p {
    margin: 0;
    color: black;
}

.card a {
    display: block;
    margin-top: 10px;
    background-color: #1E90FF;
    color: #fff;
    text-align: center;
    padding: 8px;
    border-radius: 5px;
    text-decoration: none;
}

.card a:hover {
    background-color: #555;
}

.card form {
    margin-top: 10px;
}

.card form input[type="text"] {
    width: 100%;
    padding: 5px;
}

.card form input[type="submit"] {
    margin-top: 5px;
    background-color: #1E90FF;
    color: #fff;
    text-align: center;
    padding: 8px;
    border-radius: 5px;
    border: none;
    cursor: pointer;
}

.card form input[type="submit"]:hover {
    background-color: #555;
}
</style>
</head>

<body>
<script src="js/bootstrap.min.js"></script>
    <header >
        <nav class="container-fluid">
          <div class="logo">
            <img src="logo.png" alt="Tokopedia Logo">
          </div>
        </nav>
            <a class="lomgin2" href="hasillogin.php">Home</a> 
            <a class="lomgin2" href="jual.php">Jual Barang</a>
            <a class="lomgin2" href="user_barang.php">Barang Saya</a>
            <a class="lomgin2" href="penjualan.php">Barang Terjual</a> 
            <a class="lomgin2" href="keranjang.php">Keranjang</a>
            <a class="lomgin2"" href="logout.php">Logout</a> 
      </header>

<?php
$koneksi = mysqli_connect("localhost", "root", "", "toko");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}
session_start();
$sql = "SELECT * FROM barang where login_id = '".$_SESSION['id']."'";
$result = mysqli_query($koneksi, $sql);
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div class='card'>";

        echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
        //echo "<h3>id barang: " . $row["idbarang"]. "</h3>";
        echo "<h3>Name: " . $row["nama"]. "</h3>";
        echo "<p>Rp." . $row["harga"]. "</p>";
        echo "<a href='barang.php?idbarang=".$row['idbarang']."'>Deskripsi</a> <br>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='record_id' value='".$row['idbarang']."'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "<br>";
        echo "<form method='post'>";
        echo "<input type=text name='harga' value='".$row['harga']."'>";
        echo "<input type='hidden' name='record_id' value='".$row['idbarang']."'>;";
        echo "<input type='submit' name='update' value='Update'>";
        echo "</form>";
        echo "<br>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

if(isset($_POST['delete'])){
    $sql1 = "DELETE FROM keranjang WHERE idbarang = '".$_POST['record_id']."'";
    $sql2 = "DELETE FROM barang WHERE idbarang = '".$_POST['record_id']."'";
    $sql3 = "DELETE FROM transaksi WHERE idbarang = '".$_POST['record_id']."'";
    $result = mysqli_query($koneksi, $sql1);
    $result2 = mysqli_query($koneksi, $sql2);
    if ($result2) {
        header("Location: ".$_SERVER['PHP_SELF']);
        echo "<div class='alert alert-success' role='alert'>Record deleted successfully</div>";
        

    
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}

if(isset($_POST['update'])){
    $sql = "UPDATE barang SET harga = '".$_POST['harga']."' WHERE idbarang = '".$_POST['record_id']."'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "Record updated successfully";
        header("Location: ".$_SERVER['PHP_SELF']);
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>


</body>
</html>
