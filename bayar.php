<?php
require_once("koneksi.php");
session_start();
$id_keranjang = $_POST['id_keranjang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];


echo "bayar ke rekening ".$bank." sejumlah ".$total." dengan id keranjang ".$id_keranjang." dan jumlah ".$jumlah."";


?>

<form action="insert_transaksi.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_keranjang" value="<?php echo $id_keranjang; ?>">
<label for="gambar">Upload bukti pembayaran</label>
<input type="file" name="gambar" id="gambar">
<input type="submit" name="submit" value="bayar">
</form>








