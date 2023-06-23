
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
        echo "id barang: " . $row["idbarang"]. " - Name: " . $row["nama"]. " " . $row["harga"]. "<br>";
        echo "<a href='barang.php?idbarang=".$row['idbarang']."'>Beli</a> <br>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='record_id' value='".$row['idbarang']."'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "<br>";
        echo "<form method='post'>";
        echo "<input type=text name='harga' value='".$row['harga']."'>";
        echo "input type='submit' name='update' value='Update'>";
        echo "</form>";
        
    }
} else {
    echo "0 results";
}

if(isset($_POST['delete'])){
    $sql = "DELETE FROM barang WHERE idbarang = '".$_POST['record_id']."'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($koneksi);
    }
}

if(isset($_POST['update'])){
    $sql = "UPDATE barang SET harga = '".$_POST['harga']."' WHERE idbarang = '".$_POST['record_id']."'";
    $result = mysqli_query($koneksi, $sql);
    if ($result) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($koneksi);
    }
}






mysqli_close($koneksi);
?>    
</body>
</html>