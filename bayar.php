
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            text-align: center;
            margin-top: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="file"] {
            margin-bottom: 20px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<?php
require_once("koneksi.php");
session_start();

$id_keranjang = $_POST['id_keranjang'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];
$bank = $_POST['bank'];
$rekening = $_POST['rekening'];
$id_penjual = $_POST['id_penjual'];
$penjual = $_POST['penjual'];

$sql = "SELECT DISTINCT login.username as 'penjual' FROM login JOIN keranjang ON login.id = keranjang.id WHERE keranjang.id = '".$id_penjual."'";
$result = mysqli_query($koneksi, $sql);
echo $sql;
if ($result) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       // $penjual = $row["penjual"];
    }
} else {
    echo "0 results";
}



?>
<h1>SEGERA SELESAIKAN PEMBAYARAN</h1>
<h1>no rekening= <?php echo $rekening;?>  bank <?php echo $bank;?> ,atas nama <?php echo $penjual; ?></h1>

<h1>Total Pembayaran : <?php echo $total ?></h1>
<form action="insert_transaksi.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_keranjang" value="<?php echo $id_keranjang; ?>">
<label for="gambar">Upload bukti pembayaran</label>
<input type="file" name="gambar" id="gambar">
<input type="hidden" name="id_penjual" value="<?php echo $id_penjual; ?>">
<input type="submit" name="submit" value="bayar">
</form>


    <!-- Your PHP code and HTML form here -->
</body>
</html>
