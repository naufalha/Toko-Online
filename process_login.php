<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan validasi login
    // Misalnya, periksa username dan password dalam database

    $koneksi = mysqli_connect("localhost", "root", "", "toko");

    // Query untuk memeriksa kecocokan username dan password dalam database
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);
    

    if(mysqli_num_rows($result) == 1){
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
