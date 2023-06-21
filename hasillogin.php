<?php 
    session_start();
    echo "Anda Berhasil Login Sebagai ".$_SESSION['username']." Dan Anda Terdaftar Sebagai ".$_SESSION['id'],$_SESSION['kategori'];
?>
<br>
<h3><a href="jual.php">jual barang</a></h3>
Silahkan Logout dengan klik link <a href="logout.php">Disini</a>