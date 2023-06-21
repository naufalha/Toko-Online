<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Pengguna</title>
</head>
<body>
    <h2>Registrasi Pengguna</h2>
    <form method="POST" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>



<?php
if(isset($_POST['register'])){
    // Ambil nilai dari input field
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Lakukan validasi data yang diterima
    if(empty($username) || empty($password) || empty($email)){
        echo "Harap isi semua field.";
    } else {
        // Lakukan penyimpanan data ke dalam database
        // Lakukan koneksi ke database

        $koneksi = mysqli_connect("localhost", "root", "", "toko");

        // Query untuk memasukkan data pengguna ke dalam tabel
        $query = "INSERT INTO login (username, password, email) VALUES ('$username', '$password', '$email')";

        // Jalankan query
        mysqli_query($koneksi, $query);

        // Tampilkan pesan sukses atau arahkan ke halaman login
        echo "Registrasi berhasil!";
        header("Location: login.php");
        exit;
    }
}
?>