<?php
sesion_start();


$koneksi = mysqli_connect("localhost", "root", "", "toko");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit;
}

$sql = "SELECT barang.nama as 'nama', barang.harga as 'harga', barang.foto as 'foto', keranjang.jumlah as 'jumlah' FROM barang JOIN keranjang ON barang.idbarang = keranjang.idbarang WHERE keranjang.id = $_SESSION['id']";
$result = mysqli_query($koneksi, $sql);
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<img  src=".$row["foto"]."><br>";
        echo "id: " . $row["login_id"]. " - Name: " . $row["nama"]. " harga Rp." . $row["harga"]. "<br>";
        echo "deskripsi: " . $row["deskripsi"]. "<br>";
        echo "<a href='tambahkeranjang.php?idbarang=".$row['idbarang']."'>Beli</a> <br>";
    }
} else {
    echo "0 results";
}
mysqli_close($koneksi);




?>