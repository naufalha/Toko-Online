<?php



require_once "koneksi.php";
session_start();
$sql = "SELECT barang.nama as 'nama', barang.harga as 'harga', barang.foto as 'foto', keranjang.jumlah as 'jumlah' FROM barang JOIN keranjang ON barang.idbarang = keranjang.idbarang WHERE keranjang.id = '".$_SESSION['id']."'";
$result = mysqli_query($koneksi, $sql);
$penjual = "";
$jumlah;
global $total;
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
        $jumlah = $row["jumlah"] * $row["harga"];
        $total = $total + $jumlah;
        echo "" . $row["nama"]. " - harga: " . $row["harga"]. " - jumlah: " . $row["jumlah"]. " - total: " . $jumlah . "<br>";
   
       
    }
    echo "Total pembelian Rp.".   $total  ."<br>";
} else {
    echo "0 results";
}
mysqli_close($koneksi);




?>
<br>
<a  href="bayar.php">bayar</a>