## Tampilan Barang yang dijual oleh user
## dalam file ini hanya menampilkan barang yang dijual oleh user yang sedang login
## user dapat menghapus barangnya sendiri

<html>
<head>
<title>Toko-Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>

<body>
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
        echo "<img  src=".$row["foto"]."><br>";
        echo "id: " . $row["login_id"]. " - Name: " . $row["nama"]. " " . $row["harga"]. "<br>";
        echo "<a href='barang.php?idbarang=".$row['idbarang']."'>Beli</a> <br>";
    }
} else {
    echo "0 results";
}
mysqli_close($koneksi);
?>    
</body>
</html>