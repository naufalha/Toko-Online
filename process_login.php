<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi login
    // Misalnya, periksa username dan password dalam database

    if($username === 'admin' && $password === 'admin123'){
        // Jika login berhasil, simpan username dalam session
        $_SESSION['username'] = $username;

        // Redirect ke halaman setelah login berhasil
        header("Location: dashboard.php");
        exit;
    } else {
        // Jika login gagal, tampilkan pesan error
        echo "Username atau password salah.";
    }
}
?>
