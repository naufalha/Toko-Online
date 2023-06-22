<?php
session_start();
if(isset($_SESSION['username'])){
   // Session masih aktif, arahkan pengguna ke halaman beranda atau halaman lain yang sesuai
   header("Location: nota.php");
   exit();
} else {
   // Arahkan pengguna langsung ke halaman lain (misalnya, halaman lain.php)
   header("Location: login.php");
   exit();
}
?>