<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
    .container {
        margin-top: 20px;
    }

    .item {
        background-color: #f5f5f5;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .item-image {
        width: 400px;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }

    .item-details {
        margin-top: 10px;
    }

    .item-name {
        font-weight: bold;
    }

    .item-price,
    .item-quantity,
    .item-total,
    .item-seller,
    .item-bank {
        margin-bottom: 5px;
    }

    .btn-bayar {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .total-pembelian {
        font-weight: bold;
        margin-top: 20px;
    }
</style>
</head>
<body>
    <header>
        <nav class="container-fluid">
            <div class="logo">
                <img src="logo.png" alt="Tokopedia Logo">
            </div>
        </nav>
            <a class="lomgin2" href="hasillogin.php">Home</a> 
            <a class="lomgin2" href="jual.php">Jual Barang</a>
            <a class="lomgin2" href="user_barang.php">Barang Saya</a>
            <a class="lomgin2" href="penjualan.php">Barang Terjual</a> 
            <a class="lomgin2" href="keranjang.php">Keranjang</a>
            <a class="lomgin2" href="logout.php">Logout</a> 
        </div>
    </header>

    <div class="container">
    <div class="row">
        <?php
        error_reporting(E_ALL & ~E_WARNING);

        require_once "koneksi.php";
        session_start();
        $sql = "SELECT login.rekening as 'rekening',keranjang.id_keranjang as 'id_keranjang',login.bank as 'bank',login.username as 'penjual',barang.login_id as 'id_penjual',login.rekening as 'rekening',
        barang.nama as 'nama', barang.harga as 'harga', barang.foto as 'foto', keranjang.jumlah as 'jumlah' FROM barang JOIN keranjang ON barang.idbarang = keranjang.idbarang JOIN login ON barang.login_id = login.id WHERE keranjang.id = '".$_SESSION['id']."' AND keranjang.terbayar= 0";
        $result = mysqli_query($koneksi, $sql);
        echo $sql;
        $jumlah;
        
        if ($result) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<h1>id ".$id_penjual."</h1>";
                echo '<div class="col-sm-5 col-md-6">';
                echo '<div class="item">';
                echo '<img width="400" height="200" src="' . $row["foto"] . '" class="item-image" alt="Product Image">';
                echo '<div class="item-details">';
                echo '<p class="item-name">' . $row["nama"] . '</p>';
                echo '<p class="item-price">Harga: Rp ' . $row["harga"] . '</p>';
                echo '<p class="item-quantity">Jumlah: ' . $row["jumlah"] . '</p>';
                echo '<p class="item-total">Total: Rp ' . $row["harga"] * $row["jumlah"] . '</p>';
                echo '<p class="item-seller">Penjual: ' . $row["penjual"] . '</p>';
                echo '<p class="item-bank">Bank: ' . $row["bank"] . '</p>';
                echo '<form action="bayar.php" method="post">';
                echo '<input type="hidden" name="id_keranjang" value="'.$row['id_keranjang'].'">';
                echo '<input type="hidden" name="iduser" value="'.$_SESSION['id'].'">';
                echo '<input type="hidden" name="id_penjual" value="'.$row['id_penjual'].'">';
                echo '<input type="hidden" name="jumlah" value="'.$row['jumlah'].'">';
                echo '<input type="hidden" name="penjual" value="'.$row['penjual'].'">';
                echo '<input type="hidden" name="total" value="'.$row["harga"] * $row["jumlah"].'">';
                echo '<input type="hidden" name="bank" value="'.$row['bank'].'">';
                echo '<input type="hidden" name="rekening" value="'.$row['rekening'].'">';
                echo '<input type="submit" name="submit" value="Bayar" class="btn-bayar">';
                echo '</form>';
                echo '</div>'; // end of item-details
                echo '</div>'; // end of item
                echo '</div>'; // end of col
                echo $row["id_penjual"];
            }
            echo '<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">';
            
            echo '</div>'; // end of col
        } else {
            echo "0 results";
        }
        mysqli_close($koneksi);
        ?>
    </div> <!-- end of row -->
</div> <!-- end of container -->

    <br>

</body>
</html>
