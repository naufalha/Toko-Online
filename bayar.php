<?php
require_once("koneksi.php");
session_start();

$id_keranjang = $_POST['id_keranjang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$id_penjual = $_POST['id_penjual'];
echo $id_penjual;
$sql = "SELECT DISTINCT login.username as 'penjual' FROM login JOIN keranjang ON login.id = keranjang.id WHERE keranjang.id = '".$id_penjual."'";
$result = mysqli_query($koneksi, $sql);

if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $penjual = $row["penjual"];
    }
} else {
    echo "0 results";
}



?>
<h1>SEGERA SELESAIKAN PEMBAYARAN</h1>
<h1>no rekening= <?php echo $rekening;?>  bank <?php echo $bank;?> ,atas nama <?php echo $penjual; ?></h1>


<form action="insert_transaksi.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_keranjang" value="<?php echo $id_keranjang; ?>">
<label for="gambar">Upload bukti pembayaran</label>
<input type="file" name="gambar" id="gambar">
<input type="hidden" name="id_penjual" value="<?php echo $id_penjual; ?>">
<input type="submit" name="submit" value="bayar">
</form>








