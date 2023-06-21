<?php 
    session_start();
    echo "Anda Berhasil Login Sebagai ".$_SESSION['username']." Dan Anda Terdaftar Sebagai ".$_SESSION['id'],$_SESSION['kategori'];
?>
<br>
<h3><a href="jual.php">jual barang</a></h3>

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
        echo "<img  src=".$row["foto"]."><br>";
        echo "id: " . $row["login_id"]. " - Name: " . $row["nama"]. " " . $row["harga"]. "<br>";
        echo "<a href='barang.php?idbarang=".$row['idbarang']."'>Beli</a> <br>";
    }
} else {
    echo "0 results";
}
mysqli_close($koneksi);
?>

Silahkan Logout dengan klik link <a href="logout.php">Disini</a>
