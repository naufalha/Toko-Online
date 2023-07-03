<?php



require_once "koneksi.php";
session_start();
$sql = "SELECT login.rekening as 'rekening',keranjang.id_keranjang as 'id_keranjang',login.bank as 'bank',login.username as 'penjual',login.id as 'id_penjual',login.rekening as 'rekening',
 barang.nama as 'nama', barang.harga as 'harga', barang.foto as 'foto', keranjang.jumlah as 'jumlah' FROM barang JOIN keranjang ON barang.idbarang = keranjang.idbarang JOIN login ON barang.login_id = login.id WHERE keranjang.id = '".$_SESSION['id']."' AND keranjang.terbayar= 0
";
$result = mysqli_query($koneksi, $sql);
$id_penjual = $row["id_penjual"];
$jumlah;
global $total;
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo '<img width="200" height="150" src="' . $row["foto"] . '" class="card-img-top" alt="...">';
        $jumlah = $row["jumlah"] * $row["harga"];
        $total = $total + $jumlah;
        echo "" . $row["nama"]. " - harga: " . $row["harga"]. " - jumlah: " . $row["jumlah"]. " - total: " . $jumlah . "<br>";
        echo "penjual: " . $row["penjual"]. " - rekening: " . $row["rekening"]." - bank: " . $row["bank"]."<br>";
        
        echo '<form action="bayar.php" method="post">';
        echo '<input type="hidden" name="id_keranjang" value="'.$row['id_keranjang'].'">';
        echo '<input type="hidden" name="iduser" value="'.$_SESSION['id'].'">';
        echo '<input type="hidden" name="id_penjual" value="'.$row['id_penjual'].'">';
        echo '<input type="hidden" name="jumlah" value="'.$row['jumlah'].'">';
        echo '<input type="hidden" name="total" value="'.$total.'">';
        echo '<input type="hidden" name="bank" value="'.$row['bank'].'">';
        echo '<input type="hidden" name="rekening" value="'.$row['rekening'].'">';
        echo '<input type="submit" name = "submit" value="bayar">';
        echo '</form>';
        echo '<br>';

    }
    echo "Total pembelian Rp.".   $total  ."<br>";
} else {
    echo "0 results";
}
mysqli_close($koneksi);




?>
<br>
<a  href="bayar.php">bayar</a>