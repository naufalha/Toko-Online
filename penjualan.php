<?php
session_start();

require_once("koneksi.php");
$sql = "SELECT transaksi.id_pembeli as pembeli,transaksi.id_keranjang as id_keranjang,transaksi.id_penjual as id_penjual,transaksi.bukti_bayar as bukti_bayar from transaksi where id_penjual = ".$_SESSION['id']."";
echo $sql;
$sql_pembeli = "SELECT login.username as username,login.alamat as alamat FROM login WHERE login.id = ".$row['pembeli']."";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $data = array();
    while($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
        echo "id: " . $row["id_keranjang"]. " - pembeli: " . $row["pembeli"]. " " . $row["bukti_bayar"]. "<br>";
    }
    echo json_encode($data);
} else {
    echo "0 results";
}




?>

