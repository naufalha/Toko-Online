<?php
session_start();

require_once("koneksi.php");
$sql = "SELECT login.username as 'pembeli',login.alamat as 'alamat', barang.nama as 'barang', barang.harga as 'harga', keranjang.jumlah as 'jumlah',transaksi.bukti_bayar as 'bukti' 
FROM login JOIN barang ON login.id = barang.login_id JOIN keranjang ON barang.idbarang = keranjang.idbarang JOIN transaksi ON keranjang.id_keranjang = transaksi.id_keranjang WHERE keranjang.terbayar = 1 AND barang.login_id = '".$_SESSION['id']."'";
$result = mysqli_query($koneksi, $sql);
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "pembeli: " . $row["pembeli"]. " - alamat: " . $row["alamat"]. " - barang: " . $row["barang"]. " - harga: " . $row["harga"]. " - jumlah: " . $row["jumlah"]. " - bukti: " . $row["bukti"]. "<br>";
    }
} else {
    echo "0 results";
}


?>